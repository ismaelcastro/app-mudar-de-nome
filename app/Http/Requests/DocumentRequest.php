<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
            'document_category_id'  => 'required|numeric',
            'name'  => 'required|max:191',
            'type' => 'required',
            'file' => 'nullable',
            'description' => 'nullable',
            'info' => 'nullable',
            'step_by_step' => 'nullable',
            'token_d4sign' => 'nullable',
            'template_d4sign' => 'nullable',
            'uuid_cofre' => 'nullable',
            'uuid_pasta' => 'nullable',
            'affiliation' => 'nullable',
            'subscription_info' => 'nullable',
            'subscription_info2' => 'nullable',
            'price' => 'nullable'
        ];
    }
}
