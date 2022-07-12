<?php

namespace App\Helpers;

use App\Models\Client;
use Illuminate\Support\Facades\Log;
use Request;
use Mautic\Auth\ApiAuth;
use Mautic\MauticApi;

class MauticHelper
{
    protected $mauticuser;
    protected $mauticpassword;
    protected $mauticurl;
    protected $auth;
    protected $api;
    protected $etapa_comercial = [];
    protected $comercial = [];
    
    public function __construct()
    {
        $this->mauticuser = 'ti@ratsbonemagri.com.br';
        $this->mauticpassword = 'Rafa5050!!';
        $this->mauticurl = 'https://mkt.ratsbonemagri.com.br';

        $this->etapa_comercial = [
            1 => 'Novo Lead',
            2 => "Tentativa de Contato",
            3 => "Sem Contato",
            4 => "Dados",
            5 => "Emissão",
            6 => "Assinatura",
            7 => "Baixo Interesse",
            8 => "Assinado",
            9 => "Arquivo Morto"
        ];

        $this->comercial = [
            1 => 'Novo',
            2 => "Tentativa",
            3 => "Sem Contato",
            4 => "Pendente",
            5 => "Atrasado",
            6 => "Resolvido",
            7 => "Baixo Interesse",
            8 => "Custo Alto",
            9 => "Prazo Estimado",
            10 => "Concorrente",
            11 => "Futuramente",
            12 => "Curiosidade",
            13 => "Arquivo Morto",
            14 => "Reativado",
            15 => "Assinado"
        ];

        $this->conect();
    }

    protected function conect()
    {       
        $settings = array(
            'userName'   => $this->mauticuser,
            'password'   => $this->mauticpassword
        );
        $initAuth = new ApiAuth();
        $this->auth = $initAuth->newAuth($settings, 'BasicAuth');
        $this->api = new MauticApi();
    }

    public function send_mail($mail_id, $contact_id)
    {
        $api = $this->api;
        $auth = $this->auth;
        $mauticurl = $this->mauticurl;

        $emailApi = $api->newApi("emails", $auth, $mauticurl . "/api");				
        $email = $emailApi->sendToContact($mail_id, $contact_id);
        return $email;
    }

    public function update_contact(Client $client, $data)
    {
        $api = $this->api;
        $auth = $this->auth;
        $mauticurl = $this->mauticurl;
        $contactApi = $api->newApi('contacts', $auth, $mauticurl . "/api");

        $createIfNotFound = false;

        if(is_null($client->mautic_id)){
            $this->add_contact($client);
            $contactApi->edit($client->mautic_id, $data, $createIfNotFound);
        }else{
            $contactApi->edit($client->mautic_id, $data, $createIfNotFound);
        }
        
    }

    public function add_contact(Client $client)
    {  
        $call = $client->call()->orderBy('calls.id','desc')->first();

        $api = $this->api;
        $auth = $this->auth;
        $mauticurl = $this->mauticurl;

        $contactApi = $api->newApi('contacts', $auth, $mauticurl . "/api");

        //Dados que serão enviados
        $data = [];
        $data['firstname'] = $client->first_name;
        if(isset($client->last_name) && !is_null($client->last_name) ){$data['lastname'] = $client->last_name;}
        $data['email'] = $client->email;
        $data['mobile'] = $client->phone;
        if($call)
            $data['reason'] = $call->reason->name;
        else
            $data['reason'] = 'Outros';
        
        $data['objetivo'] = 'Saber se possuo direito';
        $data['comercial'] = $this->comercial[1];
        $data['etapacomercial'] = $this->etapa_comercial[1];
        $data['ipAddress'] = Request::ip() ?? null;        
        
        $response = $contactApi->create($data);
        if (isset($response['errors'])) {
            $errors = $response['errors'];
            foreach ($errors as $error) {
                Log::error('Não foi possível cadastrar o contato '.$client->name.' do ID '.$client->id.' no Mautic - Cód:'.$error['code'].'  - '.$error['message'].' ');
            }
            return $response['errors'];
        }
        
        $contact = $response[$contactApi->itemName()];
        if(!is_null($contact)){
            $contact_id = $contact['id'];
            //$this->send_mail(59, $contact_id);
            return $contact_id;
        }else{            
            return null;
        }
    }
}