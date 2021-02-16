<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReporterWuloAbelEditRequest extends FormRequest
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
            'sdate' => 'required',
            'splace' => 'required',
            'dkplace' => 'required',
            'dkbirr' => 'required',

            'dmplace' => 'required',
            'dmbirr' => 'required',

            'deplace' => 'required',
            'debirr' => 'required',

            'workddate' => 'required',

            'adarplace' => 'required',
            'adarbirr' => 'required',

        ];
    }
}
