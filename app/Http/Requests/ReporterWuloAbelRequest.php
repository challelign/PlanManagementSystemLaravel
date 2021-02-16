<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReporterWuloAbelRequest extends FormRequest
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

//            'user_id' => 'required',
//            'dkplace' => 'required',
//            'dkbirr' => 'required',
//            'dmplace' => 'required',
//            'dmbirr' => 'required',
//            'deplace' => 'required',
//            'debirr' => 'required',
//            'workddate' => 'required',
//            'workdtime' => 'required',
//            'adarplace' => 'required',
//            'adarbirr' => 'required',

//            'plan_id' => 'required',
            'nodate' => 'required|max:2',
            'ekid_on_list' => 'required|min:50',
            'ekid_on_list_done' => 'required|min:50',
            'ekid_ont_on_list_done' => 'required|min:10',
            'not_done_reason' => 'required',

        ];
    }
}
