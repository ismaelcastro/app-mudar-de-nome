<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallGuide extends Model
{
    const STATUS = [
        'new' => 'Novo',
        'approved' => 'Aprovado',
        'disapproved' => 'Reprovado',
        'pending' => 'Pendente'
    ];

    protected $fillable = [
        'user_id', 
        'client_id',
        'call_id', 
        'guide_id', 
        'status',
        'name',
        'reason',
        'file',
        'file_download',
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

    public function guide()
    {
        return $this->belongsTo(Guide::class);
    }
    
    public function guideCase($call_id, $guideCategory_id)
    {
        $queryORM = $this
            ->join('guides', 'guides.id', '=', 'call_guides.guide_id')
            ->where('call_guides.call_id' , $call_id)
            ->where('guides.guide_category_id' , $guideCategory_id);
            return $queryORM->get(
                [
                    'call_guides.name as cdtitle', 
                    'call_guides.status as cdstatus', 
                    'call_guides.id as cdid', 
                    'call_guides.updated_at as updated_at', 
                    'call_guides.file',
                    'call_guides.file_download'
                ]
            );
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('d/m/Y H:i', strtotime($value));
    }
}
