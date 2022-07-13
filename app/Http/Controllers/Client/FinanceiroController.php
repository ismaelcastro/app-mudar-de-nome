<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Mail\SendMailNotification;
use Illuminate\Support\Facades\Mail;
use App\Models\Call;
use App\Models\CallRegister;
use App\Models\Help;
use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

class FinanceiroController extends Controller
{

    protected $to;
    protected $client_id;
    protected $client_secret;
    protected $client_id_old;
    protected $client_secret_old;

    public function __construct()
    {
        $this->client_id = 'Client_Id_ccad99d632d33adf58832838cef15965d33e0e18';
        $this->client_secret = 'Client_Secret_016f998c1ce697b7e6037c0479d5db062ae6958c';

        $this->client_id_old = 'Client_Id_f9bc6849a63ba53190d5a85674bebb66b7a0aabf';
        $this->client_secret_old = 'Client_Secret_72e14b8f5b8c14d89be3104ebca16790c4470387';

        $this->to = 'registro@ratsbonemagri.com.br';
    }

    public function carne()
    {
        $prxVencimento = '';
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id', 'desc')->first();
        $gerencianet_id = $call->gerencianet_id;
        $call_honorary = number_format($call->call_honorary()->sum('amount'), 2, ',', '.');
        $installments = $call->installments;
        $call_honorary = $call->call_honorary()->sum('amount');
        $valor_parcela = $call_honorary / $installments;
        $call_honorary = number_format($call_honorary, 2, ',', '.');
        $valor_parcela = number_format($valor_parcela, 2, ',', '.');
        $options = [
            'client_id' => $this->client_id,
            'client_secret' => $this->client_secret,
            'sandbox' => false // altere conforme o ambiente (true = desenvolvimento e false = producao)
        ];
        // $carnet_id refere-se ao ID do carnê desejado
        $params = [
            'id' => $call->gerencianet_id
        ];

        $looping0 = [];

        try {
            $api = new Gerencianet($options);
            $carnet = $api->detailCarnet($params, []);
            //dd($carnet);
            $looping0 = $carnet['data']['charges'];
        } catch (GerencianetException $e) {
            $codigo_err = $e->code;
            $error = $e->error;
            $errorDescription = $e->errorDescription;
            //dd($codigo_err,$error,$errorDescription);
            Log::error('Cliente tentou gerar boleto Gerencianet, mas houve um erro' . $client->name . ', do ID ' . $client->id . ' - Código do erro - ' . $codigo_err . ' - Erro - ' . $error . ' - Descrição - ' . $errorDescription['property'] ?? '' . ' - ' . $errorDescription['message'] ?? '' . ' ');
        } catch (\Exception $e) {
            Log::error('Cliente tentou gerar boleto Gerencianet, mas houve um erro' . $client->name . ', do ID ' . $client->id . ' mas o gerencianet simplesmente não funcionou, veja se esta mensagem ajuda: ' . $e->getMessage());
        }

        $helps = Help::where('pages', 'REGEXP', '[[:<:]]financeiro_carne[[:>:]]')->orderBy('order', 'asc')->get();

        return view(
            'client.pages.financeiro.carne',
            compact('gerencianet_id', 'looping0', 'call', 'call_honorary', 'prxVencimento', 'valor_parcela', 'helps')
        );
    }

    public function transferencia()
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id', 'desc')->first();
        $helps = Help::where('pages', 'REGEXP', '[[:<:]]financeiro_transferencia[[:>:]]')->orderBy('order', 'asc')->get();
        return view('client.pages.financeiro.transferencia', compact('call', 'helps'));
    }

    public function adexitum()
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id', 'desc')->first();
        $helps = Help::where('pages', 'REGEXP', '[[:<:]]financeiro_adexitum[[:>:]]')->orderBy('order', 'asc')->get();
        return view('client.pages.financeiro.adexitum', compact('call', 'helps'));
    }


    public function comprovante_anexo(Request $request, Call $call)
    {
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $extension = $request->file->extension();
            $fileName = str_replace($extension, '', $request->file->getClientOriginalName());
            $folder = Str::slug($call->client->id . '-' . $call->client->name);
            $fileNameFormated = Str::slug($fileName) . '_' . rand(10, 99) . '.' . $extension;
            $upload = $request->file->storeAs($folder, $fileNameFormated, 'private');

            $client = auth('client')->user();

            if ($upload) {
                $data = [
                    'paymentreceipt' => $fileNameFormated
                ];
                $call->fill($data);
                $call->save();

                $dataRegister = [
                    'client_id' => $client->id,
                    'call_id' => $call->id,
                    'description' => $client->first_name . " anexou um comprovante de pagamento **" . $fileNameFormated,
                    'step' => 'precess'
                ];
                CallRegister::create($dataRegister);

                $to = $this->to;
                $data2 = [
                    'aviso' => '<h2>' . $client->first_name . ' referente ao atendimento ' . $call->id . ' anexou um comprovante de pagamento</h2>',
                    'file_attach' => 'app/private/' . $folder . '/' . $fileNameFormated
                ];
                Mail::to($to)
                    ->send(new SendMailNotification($data2));

                return redirect()->back()->with('success', 'Comprovante enviado com sucesso!');
            } else {
                return redirect()->back()->with('error', 'Não foi possível fazer upload!');
            }
        }
    }
}
