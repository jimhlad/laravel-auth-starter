<?php

namespace App\Http\Requests\User;

use Log;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{

    /**
     * Our trusty Guard contract.
     * 
     * @var Illuminate\Contracts\Auth\Guard $auth
     */
    private $auth;

    /**
     * Create a new controller instance.
     *
     * @param Illuminate\Contracts\Auth\Guard $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->auth->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'email' => 'required|email|max:255|unique:users,email,'.$this->auth->user()->id,
        ];
    }
}
