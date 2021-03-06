<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class editUserRequest extends Request
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
            //users=>table name
            'username'=>'required|unique:users,username,'.$this->route("id"),
            'email'=>'required',
            'firstname'=>'required',
            'lastname'=>'required',
        ];
    }
}
