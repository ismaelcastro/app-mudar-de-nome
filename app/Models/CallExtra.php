<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallExtra extends Model
{
    protected $fillable = [
        'user_id',
        'client_id',
        'call_id',
        'document_id',
        'status',
        'name',
        'reason',
        'file',
        'created_at',
        'extra_category_id'
    ];

    const STATUS = [
        'new' => 'Novo',
        'approved' => 'Aprovado',
        'disapproved' => 'Reprovado',
        'pending' => 'Pendente'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function call()
    {
        return $this->belongsTo(Call::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function documentCase($call_id, $documentCategory_id, $client_id = null)
    {
        $queryORM = $this
            ->join('documents', 'documents.id', '=', 'call_extras.document_id')
            ->where('call_extras.call_id' , $call_id)
            ->whereNull('extra_category_id')
            ->where(function ($query) use ($client_id) {
                if(!is_null($client_id))
                    $query->where('call_extras.client_id' , $client_id);
            })
            ->where('documents.document_category_id' , $documentCategory_id);
            return $queryORM->get(array('call_extras.name as cdtitle', 'call_extras.status as cdstatus', 'call_extras.id as cdid', 'call_extras.updated_at as updated_at', 'call_extras.file', 'call_extras.reason'));
    }

    public function documentCaseClose($call_id, $documentCategory_id)
    {
        $queryORM = $this
            ->join('documents', 'documents.id', '=', 'call_extras.document_id')
            ->where('call_extras.call_id' , $call_id)
            ->where('call_extras.extra_category_id' , $documentCategory_id);
            return $queryORM->get(array('call_extras.name as cdtitle', 'call_extras.status as cdstatus', 'call_extras.id as cdid', 'call_extras.updated_at as updated_at', 'call_extras.file'));
    }

    public function documentCaseApproved($call_id, $documentCategory_id)
    {
        $queryORM = $this
            ->join('documents', 'documents.id', '=', 'call_extras.document_id')
            ->where('call_extras.call_id' , $call_id)
            ->where('call_extras.status' , 'approved')
            ->where('documents.document_category_id' , $documentCategory_id);
            return $queryORM->get(array('documents.name', 'call_extras.name as cdtitle', 'call_extras.status as cdstatus', 'call_extras.id as cdid', 'call_extras.updated_at as updated_at', 'call_extras.file', 'call_extras.reason'));
    }

    public function documentCaseDifferentDisapproved($call_id, $documentCategory_id)
    {
        $queryORM = $this
            ->join('documents', 'documents.id', '=', 'call_extras.document_id')
            ->where('call_extras.call_id' , $call_id)
            ->where('call_extras.status' , '<>', 'disapproved')
            ->whereNull('call_extras.extra_category_id')
            ->whereNotNull('call_extras.file')
            ->where('documents.document_category_id' , $documentCategory_id);
        return $queryORM->get(array('documents.name', 'call_extras.name as cdtitle', 'call_extras.status as cdstatus', 'call_extras.id as cdid', 'call_extras.updated_at as updated_at', 'call_extras.file','call_extras.reason'));
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('d/m/Y H:i', strtotime($value));
    }
}
