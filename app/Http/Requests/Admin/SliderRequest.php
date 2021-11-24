<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'title_ar' => ['required', 'string' , 'max:100'],
            'title_en' => ['required', 'string' , 'max:100'],
            'img' => [$pagesUpdate ? 'required' : 'nullable', 'image' , 'mimes:jpg,png,jpeg,svg' , 'max:10000'],
            'background' => [$pagesUpdate ? 'required' : 'nullable', 'image' , 'mimes:jpg,png,jpeg,svg' , 'max:10000'],
            'text_ar' => ['nullable', 'string' , 'max:1000'],
            'text_en' => ['nullable', 'string' , 'max:1000'],
            'btn_text_ar' => ['nullable', 'string' , 'max:100'],
            'btn_text_en' => ['nullable', 'string' , 'max:100'],
            'url' => ['nullable', 'string' , 'max:255'],
        ];
    }
}
