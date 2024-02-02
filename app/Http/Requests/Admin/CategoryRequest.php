<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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

            'name_ar'   => ['required' , 'string'  , 'max:50'],
            'name_en'   => ['required' , 'string'  , 'max:50'],
            'type'      => ['required' , 'string'  , 'in:products,projects'],
            'slug'      => ['nullable' , 'string'  , 'max:50'],
            'sort'      => ['nullable' , 'integer' , 'max:11'],
            'icon'      => ['nullable' , 'mimes:svg', 'max:10000'],
            'url'       => ['nullable', 'string'  , 'max:255'],
        ];
    }
}
