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
        return [
            'tier_id' => 'int',
            'bvn' => 'string',
            'nin' => 'string',
            'first_name' => 'string',
            'last_name' => 'string',
            'added_by' =>  Auth::user()->id,
        ];
    }
}