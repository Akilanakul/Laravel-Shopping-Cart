<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditProductRequest extends Request
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
            //
             'name'=>'required|unique:users,username,'.$this->route("products"),
             // ????
            'description'=>'required',
            'price'=>'required',
            'photo'=>'required',
            'type_id'=>'required',
        ];
    }
}
