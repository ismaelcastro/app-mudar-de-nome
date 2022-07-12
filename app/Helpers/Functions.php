<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

use App\Models\Affiliation;
use App\Models\CallDocument;
use App\Models\CallExtra;
use App\Models\CallHonorary;
use App\Models\Client;
use App\Models\Rectification;
use Request;


class Functions
{


    public static function calcularIdade($date){
        $time = strtotime($date);
        if($time === false){
          return '';
        }

        $year_diff = '';
        $date = date('Y-m-d', $time);
        list($year,$month,$day) = explode('-',$date);
        $year_diff = date('Y') - $year;
        $month_diff = date('m') - $month;
        $day_diff = date('d') - $day;
        if($day_diff < 0 || $month_diff < 0)
             $year_diff = $year_diff-1;

        return $year_diff;
    }


    public static function firstName($name)
    {
        $nameArray = explode(' ', $name);
        return $nameArray[0];
    }

    public static function lastName($name)
    {
        $nameArray = explode(' ', $name, 2);
        return isset($nameArray[1]) ? $nameArray[1] : null;
    }

    public function paginate($items, $perPage = 20, $page = null, $options = [])
    {        
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return (new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options))->withPath(url()->current());        
    }

    public function dataHoraExtensoEvento($data, $data2, $className="")
    {
        $day = date('d', strtotime($data));
        $month = date('m', strtotime($data));
        $year = date('Y', strtotime($data));
        $time = date('H:i', strtotime($data));
        $week = date('w', strtotime($data));

        $mes = $this->minMes($month);
        $semana = $this->minSemana($week);


        $day2 = date('d', strtotime($data2));
        $month2 = date('m', strtotime($data2));
        $year2 = date('Y', strtotime($data2));
        $time2 = date('H:i', strtotime($data2));
        $week2 = date('w', strtotime($data2));
        $semana2 = $this->minSemana($week2);

        if($className == ''){
            $datetime1 = strtotime($data);
            $datetime2 = strtotime(date('Y-m-d H:i:s'));
            if($datetime2 >= $datetime1){
                $className = 'text-danger';
            }else{
                $className = 'text-success';
            }
        }

        if( date('Y-m-d', strtotime($data)) == date('Y-m-d', strtotime($data2)) ){
            return '<span class="'.$className.'" >'.$semana.', '.$day.' de '.$mes.' '.$year.'</span> | '.$time.' às '.$time2.' ';
        }else{
            return '<span class="'.$className.'" >'.$semana.', '.$day.' de '.$mes.' '.$year.'</span> | '.$time.' até  '.'<span class="'.$className.'" >'.$semana2.', '.$day2.' de '.$mes2.' '.$year2.'</span> | '.$time2;
        }

    }

    public function dataHoraExtenso($data, $className="")
    {
        $day = date('d', strtotime($data));
        $month = date('m', strtotime($data));
        $year = date('Y', strtotime($data));
        $time = date('H:i', strtotime($data));
        $week = date('w', strtotime($data));

        $mes = $this->minMes($month);
        $semana = $this->minSemana($week);
        if($className == ''){
            $datetime1 = strtotime($data);
            $datetime2 = strtotime(date('Y-m-d H:i:s'));

            if($datetime2 >= $datetime1){
                $className = 'text-danger';
            }else{
                $className = 'text-success';
            }
        }
        return '<span class="'.$className.'" >'.$semana.', '.$day.' de '.$mes.' '.$year.'</span> | '.$time.' ';
    }

    public function minMes($mes)
    {
        switch ($mes){
            case 1: $mes = "Jan"; break;
            case 2: $mes = "Fev"; break;
            case 3: $mes = "Mar"; break;
            case 4: $mes = "Abr"; break;
            case 5: $mes = "Mai"; break;
            case 6: $mes = "Jun"; break;
            case 7: $mes = "Jul"; break;
            case 8: $mes = "Ago"; break;
            case 9: $mes = "Set"; break;
            case 10: $mes = "Out"; break;
            case 11: $mes = "Nov"; break;
            case 12: $mes = "Dez"; break;

        }
        return $mes;
    }

    public function maxMes($mes)
    {
        switch ($mes){
            case 1: $mes = "Janeiro"; break;
            case 2: $mes = "Fevereiro"; break;
            case 3: $mes = "Março"; break;
            case 4: $mes = "Abril"; break;
            case 5: $mes = "Maio"; break;
            case 6: $mes = "Junho"; break;
            case 7: $mes = "Julho"; break;
            case 8: $mes = "Agosto"; break;
            case 9: $mes = "Setembro"; break;
            case 10: $mes = "Outubro"; break;
            case 11: $mes = "Novembro"; break;
            case 12: $mes = "Dezembro"; break;

        }
        return $mes;
    }

    public function minSemana($semana)
    {
        switch ($semana) {
            case 0: $semana = "Dom"; break;
            case 1: $semana = "Seg"; break;
            case 2: $semana = "Ter"; break;
            case 3: $semana = "Qua"; break;
            case 4: $semana = "Qui"; break;
            case 5: $semana = "Sex"; break;
            case 6: $semana = "Sáb"; break;
        }
        return $semana;
    }

    public function maxSemana($semana)
    {
        switch ($semana) {
            case 0: $semana = "Domingo"; break;
            case 1: $semana = "Segunda Feira"; break;
            case 2: $semana = "Terça Feira"; break;
            case 3: $semana = "Quarta Feira"; break;
            case 4: $semana = "Quinta Feira"; break;
            case 5: $semana = "Sexta Feira"; break;
            case 6: $semana = "Sábado"; break;
        }
        return $semana;
    }

    public function mask($val, $mask) {
        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++) {
            if($mask[$i] == '#') {
                if(isset($val[$k])) $maskared .= $val[$k++];
            } else {
                if(isset($mask[$i])) $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }


    public static function position($number)
    {
        switch ($number) {
            case 1: $position = "Primeiro"; break;
            case 2: $position = "Segundo"; break;
            case 3: $position = "Terceiro"; break;
            case 4: $position = "Quarto"; break;
            case 5: $position = "Quinto"; break;
            case 6: $position = "Sexto"; break;
            case 7: $position = "Sétimo"; break;
            case 8: $position = "Oitavo"; break;
            case 9: $position = "Nono"; break;
            case 10: $position = "Décimo"; break;
            case 11: $position = "Décimo Primeiro"; break;
            case 12: $position = "Décimo Segundo"; break;
            case 13: $position = "Décimo Terceiro"; break;
            case 14: $position = "Décimo Quarto"; break;
            case 15: $position = "Décimo Quinto"; break;
            case 16: $position = "Décimo Sexto"; break;
            case 17: $position = "Décimo Sétimo"; break;
        }
        return $position;
    }


    public static function arrayDay()
    {
        $days = [];
        for($dia=1;$dia<=31;$dia++ ){
            $day_formated = str_pad($dia,2,'0',STR_PAD_LEFT);
            $days[$day_formated] = $day_formated;
        }
        return $days;
    }

    public static function arrayMonth()
    {
        $months = [];
        for($mes=1;$mes<=12;$mes++ ){
            $month_formated = str_pad($mes,2,'0',STR_PAD_LEFT);
            $months[$month_formated] = $month_formated;
        }
        return $months;
    }

    public static function arrayYear()
    {
        $years = [];
        $thisYear = (int)date('Y');
        for($ano=$thisYear;$ano>=($thisYear-90);$ano-- ){
            $years[$ano] = $ano;
        }
        return $years;
    }

    public static function number_array($numbet)
    {
        $dynamicarray = [];
        for($i=1;$i<=$numbet;$i++)
        {
            $dynamicarray[$i]=$i;
        }
        return $dynamicarray;
    }

    public static function number_array_installments($numbet,$total)
    {
        $dynamicarray = [];
        for($i=1;$i<=$numbet;$i++)
        {
            $valor_parcela = $total / $i;
            $valor_parcela = number_format($valor_parcela,2,',','.');
            $dynamicarray[$i]=$i.'x &nbsp; R$ '.$valor_parcela;
        }
        return $dynamicarray;
    }

    public static function days_payment()
    {
        $days = [5,15,25];
        $dates = [];
        $dates2 = [];

        $day_today = (int)date('d');
        $month_today = (int)date('m');
        $year_today = (int)date('Y');

        $month_next = $month_today < 12 ? $month_today + 1 : 1;
        $year_next = $month_today < 12 ? $year_today : $year_today + 1;

        foreach($days as $day){
            $date = $day_today > $day ? ($year_next.'-'.str_pad($month_next,2,'0',STR_PAD_LEFT).'-'.str_pad($day,2,'0',STR_PAD_LEFT)) : ($year_today.'-'.str_pad($month_today,2,'0',STR_PAD_LEFT).'-'.str_pad($day,2,'0',STR_PAD_LEFT));
            $dateIndice = str_replace('-','',$date);
            $date_formated = date('d/m/Y',strtotime($date));
            $dates2[$date] = $dateIndice;
            $dates[$date] = $date_formated;
        }
        asort($dates2);
        foreach($dates2 as $key=>$value){
            $dates2[$key] = $dates[$key];
        }
        return $dates2;
    }

    public static function valorPorExtenso($valor=0) {
        $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
        $plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões","quatrilhões");

        $c = array("", "cem", "duzentos", "trezentos", "quatrocentos","quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
        $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta","sessenta", "setenta", "oitenta", "noventa");
        $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze","dezesseis", "dezesete", "dezoito", "dezenove");
        $u = array("", "um", "dois", "três", "quatro", "cinco", "seis","sete", "oito", "nove");

        $z=0;

        $valor = number_format($valor, 2, ".", ".");
        $inteiro = explode(".", $valor);
        for($i=0;$i<count($inteiro);$i++)
            for($ii=strlen($inteiro[$i]);$ii<3;$ii++)
                $inteiro[$i] = "0".$inteiro[$i];

        // $fim identifica onde que deve se dar junção de centenas por "e" ou por "," ;)
        $fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);
        $rt = '';
        for ($i=0;$i<count($inteiro);$i++) {
            $valor = $inteiro[$i];
            $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
            $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
            $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

            $r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd && $ru) ? " e " : "").$ru;
            $t = count($inteiro)-1-$i;
            $r .= $r ? " ".($valor > 1 ? $plural[$t] : $singular[$t]) : "";
            if ($valor == "000")$z++; elseif ($z > 0) $z--;
            if (($t==1) && ($z>0) && ($inteiro[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t];
            if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) && ($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
        }

        return($rt ? $rt : "zero");
    }

    public static function _percents_breve()
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();

        $tot_itens_breve = 2;
        $qtd_coautor = CallHonorary::where('call_id',$call->id)->where('description','coautor')->count();
        $tot_itens_breve = $tot_itens_breve + $qtd_coautor;

        $tot_itens_breve_preenchido = 0;
        if(!is_null($call->breve_relato) && $call->status_breve_relato != 'disapproved')
            $tot_itens_breve_preenchido = $tot_itens_breve_preenchido + 1;

        $tot_retifications = Rectification::where('call_id',$call->id)->count();
        $tot_itens_breve_preenchido = $tot_itens_breve_preenchido + $tot_retifications;

        $percents_itens_breve = $tot_itens_breve_preenchido / ($tot_itens_breve / 100);
        $percents_itens_breve = ceil($percents_itens_breve);
        return $percents_itens_breve;
    }

    public static function _percent_document_per_name($client_id, $document_category_id)
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();


        $documents_qtd = CallDocument::where('client_id',$client_id)->where('call_id',$call->id)
        ->whereHas('document', function($q) use($document_category_id) {
            $q->where('document_category_id', $document_category_id);
        })
        ->count();

        $documents_approved_qtd = CallDocument::with('document')->where('client_id',$client_id)->where('call_id',$call->id)
        ->where('status','<>','disapproved')->whereNotNull('file')
        ->whereHas('document', function($q) use($document_category_id) {
            $q->where('document_category_id', $document_category_id);
        })
        ->count();

        $documents_pending_qtd = $documents_qtd - $documents_approved_qtd;
        $percent = $documents_qtd > 0 ? $documents_approved_qtd/($documents_qtd/100) : 0;
        $percent = (int)$percent;

        $data = [
            'total_docs' => $documents_qtd,
            'approved_docs' => $documents_approved_qtd,
            'pending_docs' => $documents_pending_qtd,
            'percent' => $percent
        ];

        return $data;

    }

    public static function _percent_document_extra_per_name($client_id, $document_category_id)
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id', 'desc')->first();

        $documents_qtd = CallExtra::where('client_id', $client_id)->where('call_id', $call->id)
            ->whereNull('extra_category_id')->whereHas('document', function ($q) use ($document_category_id) {
                $q->where('document_category_id', $document_category_id);
            })->count();

        $documents_approved_qtd = CallExtra::with('document')->where('client_id', $client_id)->where('call_id', $call->id)
            ->where('status', '<>', 'disapproved')->whereNotNull('file')->whereNull('extra_category_id')
            ->whereHas('document', function ($q) use ($document_category_id) {
                $q->where('document_category_id', $document_category_id);
            })->count();

        $documents_pending_qtd = $documents_qtd - $documents_approved_qtd;
        $percent = $documents_qtd > 0 ? $documents_approved_qtd / ($documents_qtd / 100) : 0;
        $percent = (int)$percent;

        $data = [
            'total_docs' => $documents_qtd,
            'approved_docs' => $documents_approved_qtd,
            'pending_docs' => $documents_pending_qtd,
            'percent' => $percent
        ];

        return $data;
    }

    public static function _percents_claimant()
    {
        $client = auth('client')->user();
        $call = $client->call()->orderBy('calls.id','desc')->first();
        $percents_claimant = 0;
        if(!is_null($call->is_claimant)){
            $qtd_to_do = 0;
            $qtd_done = 0;
            if(!is_null($call->descendants_quantity) && $call->descendants_quantity > 0){
                $qtd_to_do = $qtd_to_do + $call->descendants_quantity;
                $descendant_cont = Affiliation::where('call_id',$call->id)->where('type','descendant')->count();
                $qtd_done = $qtd_done + $descendant_cont;
            }
            if($call->is_claimant){
                if($client->marital_status=='casado'){
                    $qtd_to_do = $qtd_to_do + 1;
                    $spouse = Affiliation::where('call_id',$call->id)->where('type','spouse')->first();
                    if($spouse){
                        $qtd_done = $qtd_done + 1;
                    }
                }
            }else{
                $qtd_to_do = $qtd_to_do + 1;
                $requerent = Affiliation::where('call_id',$call->id)->where('type','claimant')->first();
                if($requerent){
                    $qtd_done = $qtd_done + 1;
                    $requerent_client = Client::find($requerent->client_id);
                    if($requerent_client){
                        if($requerent_client->marital_status=='casado'){
                            $qtd_to_do = $qtd_to_do + 1;
                            $spouse = Affiliation::where('call_id',$call->id)->where('type','spouse')->first();
                            if($spouse){
                                $qtd_done = $qtd_done + 1;
                            }
                        }
                    }
                }
            }
            if($qtd_to_do > 0 && $qtd_done > 0){
                $percents_claimant = $qtd_done / ($qtd_to_do / 100);
                $percents_claimant = ceil($percents_claimant);
            }

            if($qtd_to_do == 0 && $qtd_done == 0 && $call->is_claimant){
                $percents_claimant = 100;
            }

        }
        return $percents_claimant;
    }


    public static function _format_document($doc)
    {
        $doc = preg_replace("/[^0-9]/", "", $doc);
        $qtd = strlen($doc);
        if($qtd >= 11) { 
            if($qtd === 11 ) { 
                $docFormatado = substr($doc, 0, 3) . '.' .
                                substr($doc, 3, 3) . '.' .
                                substr($doc, 6, 3) . '.' .
                                substr($doc, 9, 2);
            } else {
                $docFormatado = substr($doc, 0, 2) . '.' .
                                substr($doc, 2, 3) . '.' .
                                substr($doc, 5, 3) . '/' .
                                substr($doc, 8, 4) . '-' .
                                substr($doc, -2);
            } 
            return $docFormatado;
 
        } else {
            return '';
        }

    }

    public function encurta_url($domain)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api-ssl.bitly.com/v4/shorten",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>"{\n    \"domain\": \"bit.ly\",  \n    \"long_url\": \"$domain\"  \n} ",
        CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer 4b633ce535e660b56394dd5d80a4bb905b39d880",
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $json = json_decode($response);
        return $json->link;
    }

    public static function _moedaDb($value)
    {
        $source = array('.', ',');
        $replace = array('', '.');
        return str_replace($source, $replace, $value); 
    }

}