<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'news_category_id'  => 'required|numeric',
            'name'  => 'required|max:191',
            'image'  => 'nullable|max:191',
            'date'  => 'required|date',
            'summary'  => 'nullable',
            'description'  => 'nullable',
            'websites'  => 'nullable',
            'slug'  => 'nullable|max:191',
            'metatitle'  => 'nullable|max:90',
            'metadescription'  => 'nullable|max:255'
        ];
    }
}
