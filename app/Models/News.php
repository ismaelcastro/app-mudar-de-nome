<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'name', 'news_category_id', 'image', 'date', 'summary', 'description', 'websites', 'slug', 'metatitle', 'metadescription'
    ];

    public function getPublicationAttribute()
    {
        $value = $this->date;
        return date('d/m/Y', strtotime($value));
    }

    public function getNameminAttribute()
    {
        $title = $this->name;
        if(strlen($title)>25){
            $title = substr($title,0,25).'...';
        }
        return $title;
    }

    public function getSummaryminAttribute()
    {
        $summary = $this->summary;
        if(strlen($summary)>170){
            $summary = substr($summary,0,170);
        }
        return $summary;
    }    

    public function getPublicationdayAttribute()
    {
        $publication = $this->date;
        $publicationDay = date('d', strtotime($publication));
        $publicationDay = (strlen($publicationDay) == 1 ? '0'.$publicationDay : $publicationDay );
        return $publicationDay;
    }

    public function getPublicationminmonthAttribute()
    {
        $publication = $this->date;
        $publicationMonth = date('m', strtotime($publication));
        $publicationMonth = (int)$publicationMonth;
        switch ($publicationMonth){ 
            case 1: $str_mes = "Jan"; break;
            case 2: $str_mes = "Fev"; break;
            case 3: $str_mes = "Mar"; break;
            case 4: $str_mes = "Abr"; break;
            case 5: $str_mes = "Mai"; break;
            case 6: $str_mes = "Jun"; break;
            case 7: $str_mes = "Jul"; break;
            case 8: $str_mes = "Ago"; break;
            case 9: $str_mes = "Set"; break;
            case 10: $str_mes = "Out"; break;
            case 11: $str_mes = "Nov"; break;
            case 12: $str_mes = "Dez"; break;             
        }
        return $str_mes;
    }

    public function news_category()
    {   // n X 1
        return $this->belongsTo(\App\Models\NewsCategory::class);
    }

}
