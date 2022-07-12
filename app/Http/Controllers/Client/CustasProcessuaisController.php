<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\CallGuide;
use App\Models\CallRegister;
use App\Models\Help;

class CustasProcessuaisController extends Controller
{
    public function index()
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();
        $call_id = $call->id;
        $call_guides = CallGuide::where('call_id',$call_id)->get();
        $helps = Help::where('pages','REGEXP','[[:<:]]custas_processuais[[:>:]]')->orderBy('order','asc')->get();
        return view('client.pages.custasprocessuais.index',compact('call_guides', 'client', 'call','helps'));
    }

    public function change_analise()
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();
        $call->stage_case = 'conferir_guias';
        $call->save();
        return redirect()->back();
    }

    public function guide_anexo(Request $request, CallGuide $call_guide)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid() ){
            $extension = $request->file->extension();
            $fileName = str_replace($extension, '', $request->file->getClientOriginalName());
            $folder = Str::slug($call_guide->call->client->id.'-'.$call_guide->call->client->name);
            $fileNameFormated = Str::slug($fileName).'_'.rand(10, 99).'.'.$extension;
            $upload = $request->file->storeAs($folder, $fileNameFormated, 'private');
            if ($upload){
                $data = [
                    'file' => $fileNameFormated,
                    'status' => 'pending'
                ];
                $call_guide->fill($data);
                $call_guide->save();

                $dataRegister = [
                    'client_id' => auth('client')->user()->id,
                    'call_id' => $call_guide->call->id,
                    'description' => auth('client')->user()->first_name."anexou guia <strong>{$call_guide->guide->name}</strong>",
                    'step' => 'case'
                ];                
                CallRegister::create($dataRegister);

                return redirect()->back()->with('success','Arquivo anexado com sucesso!');
                //return redirect()->to(url()->previous() . '#info-documentos_top')->with('success','Arquivo anexado com sucesso!');
            }else{
                return redirect()->back()->with('error','Não foi possível fazer upload!');
            }
        }
    }

    public function guide_remove(Request $request, CallGuide $call_guide)
    {
        $call_guide->file = null;
        $call_guide->status = 'new';
        $call_guide->save();
        return redirect()->back()->with('success','Arquivo excluído');
    }
}
