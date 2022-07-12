<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessCategoryRequest extends FormRequest
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
            'name' => 'required|max:100',
            'description' => 'required|max:255',
            'color' => 'required',
            'resume' => 'required|max:150',
            'process_type_id' => 'required',
            'etapa_mautic' => 'nullable',
            'status_call' => 'required'
        ];
    }
}
