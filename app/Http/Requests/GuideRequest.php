<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuideRequest extends FormRequest
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
            'guide_category_id'  => 'required|numeric',
            'name'  => 'required|max:191',
            'type' => 'required',
            'file' => 'nullable',
            'description' => 'nullable',
            'info' => 'nullable',
            'step_by_step' => 'nullable'
        ];
    }
}
