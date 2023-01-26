<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'phone_number' => 'required|max:11',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'username' => 'required|',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'first_name' => 'string',
            'last_name' => 'string',
            'other_names' => 'string',
            'role_id' => 'int',
        ];
    }
}