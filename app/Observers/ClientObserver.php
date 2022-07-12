<?php

namespace App\Observers;

use App\Models\Client;
use App\Helpers\MauticHelper;
use D4sign\Client as D4client;
use Request;

class ClientObserver
{
    /**
     * Handle the client "created" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    public function creating(Client $client)
    {
        //
    }
    /**
     * Handle the client "created" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    
    public function created(Client $client)
    {
        try{
            $mautic = new MauticHelper();
            $mautic_id = $mautic->add_contact($client);
            if(!is_null($mautic_id) && is_numeric($mautic_id)){
                $client->mautic_id = $mautic_id;
                $client->save();
            }
        }catch (\Exception $e) {
            //não faz nada
        }
    }

    /**
     * Handle the client "updated" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    public function updating(Client $client)
    {
        if($client->isDirty('email')){
            $signatario_novo = $client->email; 
            $signatario_antigo = $client->getOriginal('email');
            $token = config('d4sign.token');
            try{
                $d4client = new D4client();                
                $d4client->setAccessToken($token);

                $call = $client->call()->orderBy('calls.id','desc')->first();
                $key_signer = $client->key_signer;
                if(!is_numeric($key_signer) && !is_null($call->uuid_document)){
                    $return = $d4client->documents->changeemail($call->uuid_document,$signatario_antigo, $signatario_novo,$key_signer);
                    //dd($return);
                }
            }catch (\Exception $e) {
                echo $e->getMessage();
            }
        }
    }

    public function updated(Client $client)
    {
        $mautic = new MauticHelper();
        if($client->isDirty('name')){
            $data = [
                'name' => $client->first_name,
                'lastname' => $client->last_name
            ];
            $mautic->update_contact($client,$data);
        }
        if($client->isDirty('email')){
            $data = [
                'email' => $client->email
            ];
            $mautic->update_contact($client,$data);
        }
        if($client->isDirty('job')){
            $data = [
                'profissao' => $client->job
            ];
            $mautic->update_contact($client,$data);
        }
        if($client->isDirty('nacionality')){
            $data = [
                'nacionalidade' => $client->nacionality
            ];
            $mautic->update_contact($client,$data);
        }
        if($client->isDirty('phone')){
            $data = [
                'mobile' => $client->phone
            ];
            $mautic->update_contact($client,$data);
        }
        if($client->isDirty('cpf')){
            $data = [
                'cpf' => $client->cpf
            ];
            $mautic->update_contact($client,$data);
        }
        if($client->isDirty('rg')){
            $data = [
                'rg' => $client->rg
            ];
            $mautic->update_contact($client,$data);
        }
        if($client->isDirty('date_birth')){
            $data = [
                'birthday' => $client->date_birth
            ];
            $mautic->update_contact($client,$data);
        }
    }

    /**
     * Handle the client "deleted" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    public function deleted(Client $client)
    {
        //
    }

    /**
     * Handle the client "restored" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    public function restored(Client $client)
    {
        //
    }

    /**
     * Handle the client "force deleted" event.
     *
     * @param  \App\Models\Client  $client
     * @return void
     */
    public function forceDeleted(Client $client)
    {
        //
    }
}
