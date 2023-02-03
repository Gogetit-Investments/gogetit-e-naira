<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ConsumerRequest extends FormRequest
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
        // Available alpha caracters
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

// generate a pin based on 2 * 7 digits + a random character
$pin = mt_rand(1000000, 9999999)
    . mt_rand(1000000, 9999999)
    . $characters[rand(0, strlen($characters) - 1)];

// shuffle the result
$string = str_shuffle($pin);

        return [
            'registration_number' => $pin,
            'tier_id' => 'int',
            'bvn' => 'string',
            'nin' => 'string',
            'first_name' => 'string',
            'last_name' => 'string',
            'middle_name' => 'string',
            'phone_number' => 'string',
            'title_code' => 'string',
            'lga' => 'string',
            'state_code' => 'string',
            'country' => 'string',
            'state_of_birth' => 'string',
            'country_of_birth' => 'string',
            // 'added_by' =>  Auth::user()->id,
        ];
    }
}