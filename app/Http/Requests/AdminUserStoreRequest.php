<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserStoreRequest extends FormRequest
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
//            'name' => ['required', 'string', 'max:255'],
//            'username' => ['required', 'string', 'username', 'max:10', 'unique:users'],
//            'password' => ['required', 'string', 'min:8', 'confirmed'],


            'name' => ['required','string','max:50'],
            'username' => ['required','unique:users','string','max:15'],
            'halafinet' => 'required', // user id
            'department' => 'required', // department id
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
