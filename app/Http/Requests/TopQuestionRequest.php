<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopQuestionRequest extends FormRequest
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
            'question' => 'required|max:100',
            'answer' => 'required|max:255',
            'top_question_category_id' => 'required|numeric',
        ];
    }
}
