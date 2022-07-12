<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Builder;

class Dispatcher extends Model
{
    protected $fillable = [
        'document_category_id',
        'client_id',
        'call_id',
        'amount',
        'proof_of_payment',
        'status'
    ];

    const STATUS_LIST = [
        'approved' => 'Aprovado',
        'disapproved' => 'Reprovado',
        'pending' => 'Pendente'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function call()
    {
        return $this->belongsTo(Call::class);
    }

    // LOCAL SCOPES //

    public function scopeLocaleDispatcher(Builder $query, $document_category_id, $call_id, $client_id, $data)
    {
        $result = $query->where('document_category_id', $document_category_id)->where('call_id', $call_id)->where('client_id', $client_id)->first();

        if (is_null($result)){
            Dispatcher::create($data);
        }
    }
}
