<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

            'name'     => ['required' , 'string' , 'max:50'],
            'description' => ['nullable' , 'string' , 'max:255'],
        ];
    }
}
