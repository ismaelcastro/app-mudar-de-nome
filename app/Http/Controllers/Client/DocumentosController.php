<?php

namespace App\Http\Controllers\Client;

use App\Mail\SendMailEmissaoCertidao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Affiliation;
use App\Models\CallDocument;
use App\Models\DocumentCategory;
use App\Models\CallRegister;
use App\Models\Client;
use App\Models\Dispatcher;
use App\Models\Document;
use App\Models\Help;
use D4sign\Client as D4signClient;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class DocumentosController extends Controller
{
    public function documentacao(CallDocument $call_document)
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();

        $document_category = DocumentCategory::all();

        $dispatchers = Dispatcher::where('call_id',$call->id)->get();
        $dispatchers_sends = Dispatcher::where('call_id',$call->id)->whereNotNull('proof_of_payment')->get();

        return view('client.pages.documentos.documentacao',compact('document_category','client','call','call_document','dispatchers','dispatchers_sends'));
    }

    public function procuracao()
    {
        return view('client.pages.documentos.procuracao');
    }

    public function documentos_group()
    {
        //
    }

    public function upload_receipt(Request $request, DocumentCategory $document_category)
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();

        if ($request->hasFile('file') && $request->file('file')->isValid() ){
            $extension = $request->file->extension();
            $fileName = str_replace($extension, '', $request->file->getClientOriginalName());
            $folder = Str::slug($client->id.'-'.$client->name);
            $fileNameFormated = Str::slug($fileName).'_'.rand(10, 99).'.'.$extension;
            $upload = $request->file->storeAs($folder, $fileNameFormated, 'private');
            if ($upload){
                $dispatchers = $request->dispatcher ?? [];
                foreach($dispatchers as $client_id){
                    $dispatcher = Dispatcher::where('document_category_id', $document_category->id)
                    ->where('call_id',$call->id)->where('client_id',$client_id)->first();
                    if($dispatcher){
                        $dispatcher->proof_of_payment = $fileNameFormated;
                        $dispatcher->status = null;
                        $dispatcher->save();
                    }
                }
            }else{
                return redirect()->back()->with('error','Não foi possível fazer upload!');
            }
        }
        return redirect()->back();
    }

    public function change_dispatcher(Request $request, DocumentCategory $document_category)
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();

        if(isset($request->client_id) && is_array($request->client_id)){
            Dispatcher::where('document_category_id', $document_category->id)->where('call_id',$call->id)->delete();
            $request_client_id = $request->client_id;
            foreach($request_client_id as $client_id){
                Dispatcher::create(
                    [
                        'document_category_id' => $document_category->id,
                        'call_id' => $call->id,
                        'client_id' => $client_id,
                        'amount' => '380.00'
                    ]
                );
            }
        }else{
            Dispatcher::where('document_category_id', $document_category->id)->where('call_id',$call->id)->delete();
            return redirect()->back();
        }        
        return redirect()->back();
    }

    public function documentos_por_nome(DocumentCategory $document_category)
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();
        $type_list = Affiliation::TYPE;
        $category_id = $document_category->id;

        $affiliations = $call->Affiliations()->whereHas('call_documents', function ($q) use ($category_id) {
            $q->whereNotNull('status')->whereHas('document', function ($qq) use ($category_id) {
                $qq->where('document_category_id', $category_id);
            });
        })->get();

        $radiosDesp_anexar = 'checked="checked"';
        $radiosDesp_despachante = '';
        

        $dispatcher_select = Dispatcher::where('call_id',$call->id)
        ->where('document_category_id',$category_id);

        $dispatcher = $dispatcher_select->get()->pluck('client_id')->all();

        $dispatcher_first = $dispatcher_select->first();
        $comprovante = 'no';
        if($dispatcher_first && !is_null($dispatcher_first->proof_of_payment) && (is_null($dispatcher_first->status) || $dispatcher_first->status <> 'disapproved') ){
            $comprovante = 'yes';
        }

        if(count($dispatcher) > 0 && $category_id != 3){
            $radiosDesp_anexar = '';
            $radiosDesp_despachante = 'checked="checked"';
        }


        $help_page = 'documentos_pessoais';
        if($category_id == 1){
            $help_page = 'procuracao';
        }elseif($category_id == 3){
            $help_page = 'documentos_pessoais';
        }elseif($category_id == 4){
            $help_page = 'provas';
        }elseif($category_id == 5){
            $help_page = 'certidoes_negativas';
        }
        $helps = Help::where('pages','REGEXP','[[:<:]]'.$help_page.'[[:>:]]')->orderBy('order','asc')->get();

        $total = (count($dispatcher) * 380);
        $total_real = number_format($total,2,',','.');

        return view('client.pages.documentos.documentos_por_nome',
            compact(
                'document_category',
                'call',
                'client',
                'affiliations',
                'type_list',
                'helps',
                'radiosDesp_anexar',
                'radiosDesp_despachante',
                'dispatcher',
                'total_real',
                'comprovante',
                'dispatcher_first'
            )
        );
    }

    public function resend_doc_d4sign(Request $request)
    {
        if(isset($request->client_id) && is_numeric($request->client_id) && isset($request->call_document_id) && is_numeric($request->call_document_id) ){
            $client = Client::find($request->client_id);
            $token = config('d4sign.token');
            $call_document_id = $request->call_document_id;
            $call_document = CallDocument::find($call_document_id);
            if($client && $call_document && !is_null($call_document->uuid_document)){
                try{
                    $d4sign = new D4signClient();
                    $d4sign->setAccessToken($token);
                    //$d4sign->setCryptKey("{CRYPT-KEY-USER}"); 
                    $uidocument = $call_document->uuid_document;
                    $key_signer = $client->key_signer;
                    
                    $return = $d4sign->documents->resend($uidocument,$client->email,$key_signer);
                    //print_r($return);
                    
                } catch (\Exception $e) {
                    echo $e->getMessage();
                } 
            }
        }
    }

    public function documentos(Request $request, DocumentCategory $document_category)
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();
        $call_document = new CallDocument;
        
        $client_id_url = isset($request->client_id) && is_numeric($request->client_id) ? (int)$request->client_id : null;

        if ($document_category->by_contact && is_null($client_id_url)){
            return redirect()->route('client.documentos.documentos_por_nome',['document_category'=>$document_category->id]);
        }

        $category_id = $document_category->id;
        $help_page = 'documentos_pessoais_interna';
        if($category_id == 1){
            $help_page = 'procuracao';
        }elseif($category_id == 3){
            $help_page = 'documentos_pessoais_interna';
        }elseif($category_id == 4){
            $help_page = 'provas';
        }elseif($category_id == 5){
            $help_page = 'certidoes_negativas_interna';
        }
        $helps = Help::where('pages','REGEXP','[[:<:]]'.$help_page.'[[:>:]]')->orderBy('order','asc')->get();

        $documents_list = $document_category->documents;
        return view('client.pages.documentos.documentos',
            compact('document_category', 'call_document','call','documents_list','client','client_id_url','helps')
        );
    }

    public function change_analise()
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();
        $call->stage_case = 'analise_documentacao';
        $call->save();
        return redirect()->back();
    }

    public function generatedocument(Request $request, Document $document)
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();

        $type = $document->type;
        $name = $document->name;
        $description = $document->description;
        $nm_amigavel = Str::slug($name, '-');
        if($type=='word'){
            $str_descDoc = iconv('UTF-8', 'UTF-8//IGNORE', $description);
            $pw = new \PhpOffice\PhpWord\PhpWord();
            $section = $pw->addSection();
            \PhpOffice\PhpWord\Shared\Html::addHtml($section, $str_descDoc, false, false);
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment;filename="'.$nm_amigavel.'.docx"');
            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($pw, 'Word2007');
            $objWriter->save('php://output');
        }else{
            $dompdf = new \Dompdf\Dompdf;
            $dompdf->loadhtml($description);
            $dompdf->setPaper('A4', 'portrait');
            ob_clean();
            $dompdf->render();
            $dompdf->stream($nm_amigavel.'.pdf');
        }        
    }

    public function storedocument(Request $request)
    {     
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();
        
        if(isset($request->document_id) && is_numeric($request->document_id) ){
            $document_id = (int)$request->document_id;
            $document = Document::find($document_id);
            $document_name = $document->name;
        }else{
            return redirect()->back()->with('error','Necessário selecionar um tipo de documento');
        }

        $data = [
            'client_id' => $client->id, 
            'call_id' => $call->id, 
            'document_id' => $document_id, 
            'status' => 'new',
            'name' => $document_name
        ];

        Validator::make($data, [
            'name'  => 'required|max:191',
            'document_id'  => 'required|numeric'
        ])->validate();

        CallDocument::create($data);
        return redirect()->back()->with('success','Adicionado com sucesso!');
    }

    public function document_remove(Request $request, CallDocument $call_document)
    {
        $call_document->file = null;
        $call_document->status = 'new';
        $call_document->save();
        return redirect()->back()->with('success','Arquivo excluído');
    }
    
    public function document_anexo(Request $request, CallDocument $call_document)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid() ){
            $extension = $request->file->extension();
            $fileName = str_replace($extension, '', $request->file->getClientOriginalName());
            $folder = Str::slug($call_document->call->client->id.'-'.$call_document->call->client->name);
            $fileNameFormated = Str::slug($fileName).'_'.rand(10, 99).'.'.$extension;
            $upload = $request->file->storeAs($folder, $fileNameFormated, 'private');
            if ($upload){
                $data = [
                    'file' => $fileNameFormated,
                    'status' => 'pending'
                ];
                $call_document->fill($data);
                $call_document->save();

                $dataRegister = [
                    'client_id' => auth('client')->user()->id,
                    'call_id' => $call_document->call->id,
                    'description' => auth('client')->user()->first_name."anexou <strong>{$call_document->document->name}</strong>",
                    'step' => 'case'
                ];
                CallRegister::create($dataRegister);

                return redirect()->to(url()->previous() . '#info-documentos_top')->with('success','Arquivo anexado com sucesso!');
            }else{
                return redirect()->back()->with('error','Não foi possível fazer upload!');
            }
        }
    }

    public function enviodocs()
    {
        return view('client.pages.documentos.enviodocs');
    }

    public function provas()
    {
        return view('client.pages.documentos.provas');
    }

    public function certidoesnegs()
    {
        return view('client.pages.documentos.certidoesnegs');
    }

    public function enviocertidao()
    {
        return view('client.pages.documentos.enviocertidao');
    }

    public function contratarEmissao(Request $request)
    {
        $client = auth('client')->user();
        $request->request->add([
            'price' => $request->client['estado'] == "SP" ? (float)'120,00' : (float)'150,00'
        ]);
        $data = $request->except('_token');

        $folder = Str::slug($client->id . '-' . $client->name);
        $clock = uniqid(date('HisYmd'));
        
        $callDocument = CallDocument::where('client_id', $client->id)->where('document_id', (int)$data['document_id'])->first();

        // Comprovante de Pagamento //
        if ($request->hasFile('anexos.comprovante_pagamento')) {
            $pagamentoExtensao = $request->anexos["comprovante_pagamento"]->extension();
            $filePagamento = "comprovante_pagamento_despachante_$clock.$pagamentoExtensao";
            $storagePathPagamento = $request->anexos['comprovante_pagamento']->storeAs("$folder", "$filePagamento", 'private');
        }
        // Comprovante de Certidão Antiga //
        $fileCertidao = '';
        if (isset($request->anexos["certidao_antiga"]) && $request->hasFile('anexos.certidao_antiga')) {
            $certidaoExtensao = $request->anexos["certidao_antiga"]->extension();
            $fileCertidao = "emissao_certidao_{$client->id}_{$clock}.$certidaoExtensao";
            $storagePathCertidao = $request->anexos['certidao_antiga']->storeAs("$folder", "$fileCertidao", 'private');
        }

        // CREATE A PDF //
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->showImageErrors = false;

        $html = view('client.pdf.emissao_certidao', compact('data', 'folder', 'fileCertidao', 'filePagamento', 'callDocument'));
        $mpdf->WriteHTML($html);

        if ($pagamentoExtensao == 'pdf') {
            $storagePathPagamento = storage_path("app/private/{$folder}/" . $filePagamento);
            try {
                $mpdf->SetDocTemplate($storagePathPagamento, true);
                $mpdf->AddPage();
            } catch (\Throwable $th) {
            }
        }

        if (isset($certidaoExtensao) && $certidaoExtensao == 'pdf') {
            $storagePathCertidao = storage_path("app/private/{$folder}/" . $fileCertidao);
            try {
                $mpdf->SetDocTemplate($storagePathCertidao, true);
                $mpdf->AddPage();
            } catch (\Throwable $th) {
            }
        }

        $despachantePDF = "despachante_emissao_de_certidao_{$client->id}_{$clock}.pdf";
        $path = storage_path("app/private/{$folder}");
        File::makeDirectory($path, 0777, true, true);
        $mpdf->Output($path . '/' . $despachantePDF, 'F');
        $mpdf->RestartDocTemplate();
        unset($mpdf);
        // CREATE A PDF //

        $callDocument->fill(['file' => "$despachantePDF", 'status' => 'hired']);
        $callDocument->save();

        CallRegister::create([
            'client_id' => $client->id,
            'call_id' => $callDocument->call->id,
            'description' => $client->first_name."anexou <strong>{$callDocument->document->name}</strong>",
            'step' => 'case'
        ]);

        Dispatcher::create([
            'document_category_id' => $callDocument->document->document_category_id,
            'call_id' => $callDocument->call_id,
            'client_id' => $client->id,
            'status' => null,
            'amount' => $data['price'],
            'proof_of_payment' => basename($storagePathPagamento)
        ]);

        Mail::to("dpto.financeiro@ratsbonemagri.com.br")->send(new SendMailEmissaoCertidao($client, 'Contratação de Certidão'));

        return redirect()->to(url()->previous() . '#info-documentos_top')->with('success','Arquivo anexado com sucesso!');        
    }

    public function contratarDeclaracao(Request $request)
    {
        $data = $request->all();
        $client = auth('client')->user();
        $folder = Str::slug($client->id . '-' . $client->name);
        $clock = uniqid(date('HisYmd'));

        $callDocument = CallDocument::where('client_id', $client->id)->where('document_id', (int)$data['document_id'])->first();

        if ($request->hasFile('anexos.comprovante_pagamento')){
            $pagamentoExtensao = $request->anexos["comprovante_pagamento"]->extension();
            $filePagamento = "comprovante_pagamento_despachante_$clock.$pagamentoExtensao";
            $storagePathPagamento = $request->anexos['comprovante_pagamento']->storeAs("$folder", "$filePagamento", 'private');
        }

        // CREATE A PDF //
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->showImageErrors = false;

        $html = view('client.pdf.declaracao_testemunha', compact('data', 'folder', 'filePagamento', 'callDocument'));
        $mpdf->WriteHTML($html);

        if ($pagamentoExtensao == 'pdf') {
            $storagePathPagamento = storage_path("app/private/{$folder}/" . $filePagamento);
            try {
                $mpdf->SetDocTemplate($storagePathPagamento, true);
                $mpdf->AddPage();
            } catch (\Throwable $th) {
            }
        }

        $despachantePDF = "depachante_declaracao_testemunha_{$client->id}_{$clock}.pdf";
        $path = storage_path("app/private/{$folder}");
        File::makeDirectory($path, 0777, true, true);
        $mpdf->Output($path . '/' . $despachantePDF, 'F');
        $mpdf->RestartDocTemplate();
        unset($mpdf);
        // CREATE A PDF //

        $callDocument->fill(['file' => "$despachantePDF", 'status' => 'hired']);
        $callDocument->save();

        CallRegister::create([
            'client_id' => $client->id,
            'call_id' => $callDocument->call->id,
            'description' => $client->first_name . "anexou <strong>{$callDocument->document->name}</strong>",
            'step' => 'case'
        ]);

        Dispatcher::create([
            'document_category_id' => $callDocument->document->document_category_id,
            'call_id' => $callDocument->call_id,
            'client_id' => $client->id,
            'status' => null,
            'amount' => $callDocument->document->price,
            'proof_of_payment' => basename($storagePathPagamento)
        ]);

        Mail::to("dpto.financeiro@ratsbonemagri.com.br")->send(new SendMailEmissaoCertidao($client, 'Contratação de Declaração'));

        return redirect()->to(url()->previous() . '#info-documentos_top')->with('success','Arquivo anexado com sucesso!');
    }
}
