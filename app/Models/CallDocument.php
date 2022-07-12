<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallDocument extends Model
{
    const STATUS = [
        'new' => 'Novo',
        'hired' => 'Contratado',
        'waiting' => 'Aguardando',
        'approved' => 'Aprovado',
        'disapproved' => 'Reprovado',
        'pending' => 'Pendente'
    ];

    protected $fillable = [
        'user_id', 
        'client_id',
        'call_id', 
        'document_id', 
        'status',
        'name',
        'reason',
        'file',
        'uuid_document'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function call()
    {
        return $this->belongsTo(Call::class);
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function documentCase($call_id, $documentCategory_id, $client_id=null)
    {
        $queryORM = $this
            ->with('document')
            ->join('documents', 'documents.id', '=', 'call_documents.document_id')
            ->where('call_documents.call_id' , $call_id)
            ->where(function ($query) use ($client_id) {
                if(!is_null($client_id))
                    $query->where('call_documents.client_id' , $client_id);
            })            
            ->where('documents.document_category_id' , $documentCategory_id);
            return $queryORM->get(
                [
                    'documents.document_category_id',
                    'documents.name', 
                    'documents.type', 
                    'documents.file', 
                    'documents.description', 
                    'documents.info', 
                    'documents.step_by_step', 
                    'documents.affiliation', 
                    'documents.subscription_info', 
                    'documents.subscription_info2', 
                    'documents.id as doc_id',
                    'call_documents.uuid_document',
                    'call_documents.name as cdtitle', 
                    'call_documents.status as cdstatus', 
                    'call_documents.id as cdid', 
                    'call_documents.updated_at as updated_at', 
                    'call_documents.file',
                    'call_documents.reason'
                ]
            );
    }

    public function documentCaseApproved($call_id, $documentCategory_id)
    {
        $queryORM = $this
            ->join('documents', 'documents.id', '=', 'call_documents.document_id')
            ->where('call_documents.call_id' , $call_id)
            ->where('call_documents.status' , 'approved')
            ->where('documents.document_category_id' , $documentCategory_id);
            return $queryORM->get(array('documents.name', 'call_documents.name as cdtitle', 'call_documents.status as cdstatus', 'call_documents.id as cdid', 'call_documents.updated_at as updated_at', 'call_documents.file'));
    }

    public function documentCaseDifferentDisapproved($call_id, $documentCategory_id)
    {
        $queryORM = $this
            ->join('documents', 'documents.id', '=', 'call_documents.document_id')
            ->where('call_documents.call_id' , $call_id)
            ->where('call_documents.status' , '<>', 'disapproved')
            ->whereNotNull('call_documents.file')
            ->where('documents.document_category_id' , $documentCategory_id);
            return $queryORM->get(array('documents.name', 'call_documents.name as cdtitle', 'call_documents.status as cdstatus', 'call_documents.id as cdid', 'call_documents.updated_at as updated_at', 'call_documents.file'));
    }

    public function getSubscribersAttribute()
    {
        $uuid_document = $this->uuid_document;
        if(!is_null($uuid_document)){

            try {
                $curl = curl_init();

                $token = config('d4sign.token');
                $cript_key = config('d4sign.crypt_key');

                curl_setopt_array($curl, array(
                CURLOPT_URL => "https://secure.d4sign.com.br/api/v1/documents/{$uuid_document}/list?tokenAPI={$token}&cryptKey={$cript_key}",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Cookie: AWSALBTG=lOuW/ip+I7BjjjrR+4Z0zFJe6hyAuTgbKFipRIRkhtcdisdG90hwtrCfoO6MNLA/ltPckwRH52mEgzm0NYnQxxX01pipEJwdD+ZgGdbC/ujMJyDHT6bhksNxqN/9+E6ZDH0SOn4BXgkVI/mOWcPmnBtjjuLAe3osulCNA4XCooqXnc7546s=; AWSALBTGCORS=lOuW/ip+I7BjjjrR+4Z0zFJe6hyAuTgbKFipRIRkhtcdisdG90hwtrCfoO6MNLA/ltPckwRH52mEgzm0NYnQxxX01pipEJwdD+ZgGdbC/ujMJyDHT6bhksNxqN/9+E6ZDH0SOn4BXgkVI/mOWcPmnBtjjuLAe3osulCNA4XCooqXnc7546s=; AWSALB=xz0DuRVgaoZ3n7E8jLj0CAaWuhWywv9WNhhbLdszjBiFytu8ng6LdgzpcySTBKnHEOZoLQsydjSARsqem01hCnW58XAy1xhF5BR8S9BD+2T2Sx1Y5TyFzK7EvGfl; AWSALBCORS=xz0DuRVgaoZ3n7E8jLj0CAaWuhWywv9WNhhbLdszjBiFytu8ng6LdgzpcySTBKnHEOZoLQsydjSARsqem01hCnW58XAy1xhF5BR8S9BD+2T2Sx1Y5TyFzK7EvGfl; csrf_cookie_d4sign=4b7e87f85af3cfa1a72d330835ce87f1"
                ),
                ));

                $response = curl_exec($curl);            
                $response_json = json_decode($response);
                //return $response_json;
                $subscribers = [];         
                if(isset($response_json) && isset($response_json[0]->list)){
                    foreach($response_json[0]->list as $subscriber){
                        $client = Client::where('email',$subscriber->email)->first();
                        if($client){
                            $item_subscriber = [
                                'client_id' => $client->id,
                                'name' => $client->name,
                                'status' => $subscriber->signed == '0' ? 'ASSINAR' : 'ASSINOU',
                                'email' => $subscriber->email,
                                'email_sent' => $subscriber->email_sent
                            ];
                            array_push($subscribers, $item_subscriber);
                        }
                    }
                }
                return $subscribers;
            } catch (\Throwable $th) {
                dd($th);
            }

            
        }
        return [];
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('d/m/Y H:i', strtotime($value));
    }
}
