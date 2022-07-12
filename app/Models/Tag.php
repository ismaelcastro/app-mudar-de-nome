<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'call_id', 'key', 'value',
    ];

    const TAG_LIST = [
        'agree_with_divorce' => 'Concorda com o divórcio?',
        'have_children' => 'Possuem filhos',
        'reside_together' => 'Residem juntos',
        'have_assets' => 'Possuem bens',
        'change_name' => 'Pretendem alterar o nome',
        'son_is_underage' => 'Filho menor ou incapaz',
        'about_pension' => 'Pensão alimentícia'
    ];

    public function call()
    {
        return $this->belongsTo(Call::class);
    }
    
}
