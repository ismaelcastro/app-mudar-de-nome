<?php

namespace App\Http\Requests;

use App\Models\Client;
use App\Rules\ValidateCPFCNPJ;
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $type_email = implode(',',array_keys(Client::TYPE_EMAIL));
        $type_enum = implode(',',array_keys(Client::TYPE_ENUM));
        $marital_status = implode(',',array_keys(Client::MARITAL_STATUS));
        $type_address = implode(',',array_keys(Client::ADDRESS_TYPE));

        $method = $this->method();
        if( strtoupper($method)=='POST'){
            return [
                'name'  => 'required|max:191',
                'email'  => 'required|max:191|email|unique:clients,email',
                'password' => 'nullable',
                'email_type' => "nullable|in:$type_email",
                'nickname' => "nullable",
                'job' => "nullable",
                'treatment' => "nullable",
                'fathersname' => "nullable",
                'mothersname' => "nullable",
                'nacionality' => "nullable",
                'phone' => "required|min:10",
                'operator' => "nullable",
                'type_enum' => "nullable|in:$type_enum",
                'voterdocument' => "nullable",
                'cpf' => [
                    'nullable',
                    'string',
                    'min:11',
                    'unique:clients,cpf',
                    new ValidateCPFCNPJ()
                ],
                'rg' => "nullable",
                'ctps' => "nullable",
                'cnh' => "nullable",
                'expeditiondate' => "nullable|date",
                'date_birth' => "nullable|date",
                'marital_status' => "nullable|in:$marital_status",
                'addresstype' => "nullable|in:$type_address",
                'addresscep' => "nullable|min:8|max:10",
                'addressstreet' => "nullable",
                'addressnumber' => "nullable",
                'addressdistrict' => "nullable",
                'addresscomplement' => "nullable",
                'addresscity' => "nullable",
                'addressstate' => "nullable|max:2",
                'note' => "nullable"
            ];
        }else{
            return [
                'name'  => 'required|max:191',
                'email'  => 'required|max:191|email|unique:clients,email,'.$this->client->id,
                'email_type' => "nullable|in:$type_email",
                'nickname' => "nullable",
                'password' => 'nullable',                
                'job' => "nullable",
                'treatment' => "nullable",
                'fathersname' => "nullable",
                'mothersname' => "nullable",
                'nacionality' => "nullable",
                'phone' => "required|min:10",
                'operator' => "nullable",
                'type_enum' => "nullable|in:$type_enum",
                'voterdocument' => "nullable",
                'cpf' => [
                    'nullable',
                    'string',
                    'min:11',
                    'unique:clients,cpf,'.$this->client->id,
                    new ValidateCPFCNPJ()
                ],
                'rg' => "nullable",
                'ctps' => "nullable",
                'cnh' => "nullable",
                'expeditiondate' => "nullable|date",
                'date_birth' => "nullable|date",
                'marital_status' => "nullable|in:$marital_status",
                'addresstype' => "nullable|in:$type_address",
                'addresscep' => "nullable|min:8|max:10",
                'addressstreet' => "nullable",
                'addressnumber' => "nullable",
                'addressdistrict' => "nullable",
                'addresscomplement' => "nullable",
                'addresscity' => "nullable",
                'addressstate' => "nullable|max:2",
                'note' => "nullable"
            ];
        }

        
    }
}
