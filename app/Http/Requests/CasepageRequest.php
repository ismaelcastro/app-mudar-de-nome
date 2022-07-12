<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CasepageRequest extends FormRequest
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
        return [
            'name'  => 'required|max:191', 
            'image' => 'nullable', 
            'imagehover' => 'nullable', 
            'summary' => 'nullable', 
            'description' => 'nullable', 
            'tags' => 'nullable', 
            'websites' => 'nullable', 
            'slug' => 'nullable', 
            'metatitle' => 'nullable', 
            'metadescription' => 'nullable', 
            'caseaction' => 'nullable',
            'changetype_id' => 'nullable|numeric',
            'reason_id' => 'nullable|numeric'
        ];
    }
}
