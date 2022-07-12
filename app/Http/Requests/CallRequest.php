<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CallRequest extends FormRequest
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
        $case_action = \App\Models\Call::CASE_ACTION;
        $case_action_itens = implode(',', array_keys($case_action));

        $source = \App\Models\Call::SOURCE;
        $source_list = implode(',', array_keys($source));

        $occupation_area = $this->request->get('occupation_area') ?? 'retificacao';

        if($occupation_area == 'retificacao'){
            $changetype_id = 'required|numeric';
            $caseaction = "required|in:$case_action_itens";
            $currentname = 'required|min:4|max:191';
            $reason_id = 'required|numeric';
            $desiredname = 'required|min:4|max:191';
            $querent = 'required|min:4|max:191';
        }else{
            $changetype_id = 'nullable';
            $caseaction = 'nullable';
            $currentname = 'nullable';
            $reason_id = 'nullable';
            $desiredname = 'nullable';
            $querent = 'nullable';
        }

        return [
            'title'  => 'nullable|max:191',
            'client_id'  => 'required|numeric',
            'changetype_id'  => $changetype_id,
            'reason_id'  => $reason_id,
            'caseaction'  => $caseaction,
            'currentname'  => $currentname,
            'desiredname'  => $desiredname,
            'querent'  => $querent,
            'description'  => 'required',
            'source' => "required|in:$source_list",
            'occupation_area' => 'required'
        ];
    }
}
