<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'sort' => ['required', 'integer'],
            'name_ar' => ['required', 'string' , 'max:100'],
            'name_en' => ['required', 'string' , 'max:100'],
            'img' => [$pagesUpdate ? 'required' : 'nullable', 'image' , 'mimes:jpg,png,jpeg,svg' , 'max:10000'],
            'cover' => [$pagesUpdate ? 'required' : 'nullable', 'image' , 'mimes:jpg,png,jpeg,svg' , 'max:10000'],
            'shortDescription_ar' => ['required', 'string' , 'max:1000'],
            'shortDescription_en' => ['required', 'string' , 'max:1000'],
            'description_ar' => ['required', 'string'],
            'description_en' => ['required', 'string'],
        ];
    }
}
