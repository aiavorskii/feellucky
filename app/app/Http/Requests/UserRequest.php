<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|string|regex:/^\S+$/|min:4|max:255|unique:users,username',
            'phonenumber' => 'required|numeric|regex:/^(\+38)?[0-9]{10,10}$/',
        ];
    }
}
