<?php

namespace App\Http\Requests\Admin;


use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $pagesUpdate =  request()->route()->methods[0] === 'POST';

        return [
            'name'         => ['required', 'string', 'max:50'],
            'email'        => ['required', 'string', 'max:100'],
            'phone'        => ['required', 'string', 'max:20', "unique:users,phone,$this->id"],
            'password'     => [$pagesUpdate ? 'required' : 'nullable', 'string', 'min:8', 'max:50'],

        ];
    }

}
