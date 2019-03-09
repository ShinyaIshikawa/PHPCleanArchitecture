<?php

namespace Clean\Web\Adapter\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserApiRequest extends FormRequest
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
            'code'   => 'required|string|max:255',
            'password' => 'required|string|min:8|max:255',
            'name' => 'required|integer|max:255',
            'email' => 'required|email|max:255',
        ];
    }

}