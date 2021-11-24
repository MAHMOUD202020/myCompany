<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'title_ar' => ['required', 'string' , 'max:50'],
            'title_en' => ['required', 'string' , 'max:50'],
            'value' => ['required', 'string' , 'max:255'],
            'icon' => ['nullable', 'string' , 'max:50'],
            'type' => ['required', 'string' , 'in:contact,social'],
        ];
    }
}
