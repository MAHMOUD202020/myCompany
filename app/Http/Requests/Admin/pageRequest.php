<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class pageRequest extends FormRequest
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
            'name_ar' => ['required', 'string' , 'max:100'],
            'name_en' => ['required', 'string' , 'max:100'],
            'slug' => ['required', 'string' , 'max:100'],
            'cover' => [$pagesUpdate ? 'required' : 'nullable', 'image' , 'mimes:jpg,png,jpeg,svg' , 'max:10000'],
            'description_ar' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
        ];
    }
}
