<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanStoreRequest extends FormRequest
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
            'title' => 'required|unique:plans',
            'startdate'=>'required',
            'enddate'=>'required',
//            'nodate'=>'required|numeric',
            'nodate'=>'required|numeric|min:1',
            'transport_id'=>'required',
            'task'=>'required|min:20',
            'pre_payment'=>'required'

        ];
    }
}
