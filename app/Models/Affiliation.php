<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Affiliation extends Model
{
    protected $fillable = [
        'call_id', 
        'client_id',
        'type',
    ];

    const TYPE = [
        'descendant' => 'Descendente',
        'claimant' => 'Requerente',
        'spouse' => 'Cônjuge'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function call_documents()
    {
        return $this->belongsTo(CallDocument::class,'client_id','client_id');
    }

    public function call_documents_extras()
    {
        return $this->belongsTo(CallExtra::class,'client_id','client_id');
    }
}
