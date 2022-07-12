<?php

namespace App\Models;

use App\Helpers\Functions;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Client extends Authenticatable
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
        'image',
        'nickname',
        'job',
        'treatment',
        'fathersname',
        'mothersname',
        'nacionality',
        'phone',
        'operator',
        'type_enum',
        'voterdocument',
        'cpf',
        'rg',
        'expeditiondate',
        'date_birth',
        'addresstype',
        'addresscep',
        'addressstreet',
        'addressnumber',
        'addressdistrict',
        'addresscomplement',
        'addresscity',
        'addressstate',
        'marital_status',
        'note',
        'cnh',
        'ctps',
        'is_adulthood',
        'kinship',
        'mautic_id',
        'key_signer',
        'ddi',
        'gender'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    const STATES = [
        'AC' => 'Acre',
        'AL' => 'Alagoas',
        'AP' => 'Amapá',
        'AM' => 'Amazonas',
        'BA' => 'Bahia',
        'CE' => 'Ceará',
        'DF' => 'Distrito Federal',
        'ES' => 'Espírito Santo',
        'GO' => 'Goiás',
        'MA' => 'Maranhão',
        'MT' => 'Mato Grosso',
        'MS' => 'Mato Grosso do Sul',
        'MG' => 'Minas Gerais',
        'PA' => 'Pará',
        'PB' => 'Paraíba',
        'PR' => 'Paraná',
        'PE' => 'Pernambuco',
        'PI' => 'Piauí',
        'RJ' => 'Rio de Janeiro',
        'RN' => 'Rio Grande do Norte',
        'RS' => 'Rio Grande do Sul',
        'RO' => 'Rondônia',
        'RR' => 'Roraima',
        'SC' => 'Santa Catarina',
        'SP' => 'São Paulo',
        'SE' => 'Sergipe',
        'TO' => 'Tocantins'
    ];

    const STATES_PHONE = [
        '68' => 'Acre',
        '82' => 'Alagoas',
        '96' => 'Amapá',
        '92,97' => 'Amazonas',
        '71,73,74,75,77' => 'Bahia',
        '85,88' => 'Ceará',
        '61' => 'Distrito Federal',
        '27,28' => 'Espírito Santo',
        '62,64' => 'Goiás',
        '98,99' => 'Maranhão',
        '65,66' => 'Mato Grosso',
        '67' => 'Mato Grosso do Sul',
        '31,32,33,34,35,37,38' => 'Minas Gerais',
        '91,93,94' => 'Pará',
        '83' => 'Paraíba',
        '41,42,43,44,45,46' => 'Paraná',
        '81,87' => 'Pernambuco',
        '86,89' => 'Piauí',
        '21,22,24' => 'Rio de Janeiro',
        '84' => 'Rio Grande do Norte',
        '51,53,54,55' => 'Rio Grande do Sul',
        '69' => 'Rondônia',
        '95' => 'Roraima',
        '47,48,49' => 'Santa Catarina',
        '11,12,13,14,15,16,17,18,19' => 'São Paulo',
        '79' => 'Sergipe',
        '63' => 'Tocantins'
    ];

    const GENDER_LIST = [
        'masculino' => 'Masculino',
        'feminino' => 'Feminino'
    ];

    const PROFILE_COLOR = [
        'lead' => '#bf8f00',
        'inativo' => '#757171',
        'caso' => '#305496',
        'processo' => '#993300'
    ];

    const MARITAL_STATUS = [
        'solteiro' => 'Solteiro(a)',
        'casado' => 'Casado(a)',
        'divorciado' => 'Divorciado(a)',
        'viuvo' => 'Viúvo(a)',
        'separado' => 'Separado(a)'
    ];

    const ADDRESS_TYPE = [
        'comercial' => 'Comercial',
        'residencial' => 'Residencial'
    ];

    const TYPE_ENUM = [
        'celular_comercial' => 'Celular comercial',
        'telefone_comercial' => 'Telefone comercial',
        'celular_pessoal' => 'Celular pessoal',
        'telefone_pessoal' => 'Telefone pessoal'
    ];

    const TYPE_EMAIL = [
        'comercial' => 'Comercial',
        'pessoal' => 'Pessoal'
    ];

    const TREATMENT = [
        'senhor' => 'Senhor',
        'senhora' => 'Senhora'
    ];

    public function call()
    {   // 1 X 1 o id esta aqui
        return $this->hasMany(Call::class);
    }


    public function affiliation()
    {   
        return $this->hasMany(Affiliation::class);
    }

    public function getCpfFormatedAttribute()
    {
        $function = new Functions;
        $cpf = $this->cpf;
        if(!is_null($cpf)){
            $cpf = $function->mask($this->cpf, '###.###.###-##');
        }
        return $cpf;
    }

    public function getPhoneFormatedAttribute()
    {
        $function = new Functions;
        $phone = $this->phone;
        if(!is_null($phone) && strlen($phone) == 11){
            $phone = $function->mask($phone, '(##)# ####-####');
        }
        return $phone;
    }

    public function getDddAttribute()
    {
        $phone = $this->phone;
        if (!is_null($phone))
            return substr($phone, 0, 2);
        else
            return null;
    }

    public function getEmailAttribute($value)
    {
        
        $id = $this->id;
        if(is_null($this->is_adulthood)){
            return $value;
        }else{
            if($this->is_adulthood){
                return $value;
            }else{
                $affiliations = Affiliation::where('client_id',$id)->orderBy('id','desc')->first();
                if($affiliations){                    
                    $call_id = $affiliations->call_id;
                    $call = Call::find($call_id);
                    if($call){
                        return $call->client->getOriginal()['email'];
                    }
                    return $value;
                }
                return $value;
            }
        }
    }

    public function getPhoneCleanAttribute()
    {
        $phone = $this->phone;
        if (!is_null($phone)) {
            $phone = substr($phone, 2);
            if (strlen($phone) == 8)
                return substr($phone, 0, 4) . '-' . substr($phone, 4);
            elseif (strlen($phone) == 9)
                return substr($phone, 0, 5) . '-' . substr($phone, 5);
            else
                return $phone;
        } else {
            return null;
        }
    }

    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y H:i', strtotime($value));
    }

    public function getPhoneClean2Attribute()
    {
        $phone = $this->phone;
        if (!is_null($phone)) {
            return substr($phone, 2);
        } else {
            return null;
        }
    }

    public function getDateBirthBrAttribute()
    {
        if (is_null($this->date_birth)) {
            return '';
        } else {
            return date('d/m/Y', strtotime($this->date_birth));
        }

    }

    public function getDateBirthDayAttribute()
    {
        if (is_null($this->date_birth)) {
            return null;
        } else {
            return date('d', strtotime($this->date_birth));
        }

    }

    public function getDateBirthMonthAttribute()
    {
        if (is_null($this->date_birth)) {
            return null;
        } else {
            return date('m', strtotime($this->date_birth));
        }

    }

    public function getDateBirthYearAttribute()
    {
        if (is_null($this->date_birth)) {
            return null;
        } else {
            return date('Y', strtotime($this->date_birth));
        }

    }


    public function getExpeditiondateBrAttribute()
    {
        if (is_null($this->expeditiondate)) {
            return '';
        } else {
            return date('d/m/Y', strtotime($this->expeditiondate));
        }

    }


    public function getFirstNameAttribute()
    {
        return \App\Helpers\Functions::firstName($this->name);
    }

    public function getLastNameAttribute()
    {
        return \App\Helpers\Functions::lastName($this->name);
    }

    public function setAddressstateAttribute($value)
    {
        if ($value && !empty($value)) {
            $this->attributes['addressstate'] = strtoupper($value);
        } else {
            $this->attributes['addressstate'] = null;
        }
    }

    public function setAddresscepAttribute($value)
    {
        if ($value && !empty($value)) {
            $this->attributes['addresscep'] = preg_replace('/[^0-9]/', '', $value);
        } else {
            $this->attributes['addresscep'] = null;
        }
    }

    public function setPhoneAttribute($value)
    {
        if ($value && !empty($value)) {
            $this->attributes['phone'] = preg_replace('/[^0-9]/', '', $value);
        } else {
            $this->attributes['phone'] = null;
        }
    }

    public function setCpfAttribute($value)
    {
        if ($value && !empty($value)) {
            $this->attributes['cpf'] = preg_replace('/[^0-9]/', '', $value);
        } else {
            $this->attributes['cpf'] = null;
        }
    }

    public function getProfileAttribute()
    {
        $idClient = $this->id;
        //$call = Call::where('client_id', $idClient)->first();         
        $call = Call::where('client_id', $idClient)->whereNotNull('process')->first();
        if ($call) {
            return 'processo';
        }
        $call = Call::where('client_id', $idClient)->whereNotNull('stage_case')->whereNull('process')->first();
        if ($call) {
            return 'caso';
        }
        $call = Call::where('client_id', $idClient)->where('stage_call', 'cancelado')->first();
        if ($call) {
            return 'inativo';
        }
        $call = Call::where('client_id', $idClient)->where(function ($query) {
            $query->where('stage_call', 'dados')
                ->orWhere('stage_call', 'emissao')
                ->orWhere('stage_call', 'assinatura');
        })->first();
        if ($call) {
            return 'lead';
        }

        return 'lead';
    }

    public function combo()
    {
        return $this->orderBy('name', 'asc')->get()->pluck('name', 'id');
    }

    public function getInitialsnameAttribute()
    {
        $name = $this->name;
        $nameArray = explode(' ', $name);
        if (count($nameArray) > 1) {
            $firstNameInitials = substr($nameArray[0], 0, 1);
            $lastNameInitials = substr($nameArray[1], 0, 1);
            return strtoupper($firstNameInitials . $lastNameInitials);
        } else {
            $nameInitials = substr($name, 0, 2);
            return $nameInitials;
        }
    }
}
