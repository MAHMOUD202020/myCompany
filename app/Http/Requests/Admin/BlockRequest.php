<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlockRequest extends FormRequest
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
            'title_ar' => ['required', 'string' , 'max:100'],
            'title_en' => ['required', 'string' , 'max:100'],
            'img' => ['nullable', 'image' , 'mimes:jpg,png,jpeg,svg' , 'max:10000'],
            'text_ar' => ['nullable', 'string' , 'max:1000'],
            'text_en' => ['nullable', 'string' , 'max:1000'],
        ];
    }
}
