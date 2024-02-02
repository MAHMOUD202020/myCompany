<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'min:5', 'max:20'],
            'email' => ['nullable', 'email', 'min:5', 'max:100'],
            'subject' => ['required', 'string', 'max:255'],
        ];
    }
}
