<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class homeRegisterRequest extends FormRequest
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
            'username' => 'required|unique:home_user,username|regex:/[\w]{6,16}/',
            'pass' => 'required|regex:/[\w]{6,16}/',
            'repass' => 'same:pass',
            'email' => 'required|unique:home_user,email|email',
            'phone' => 'required|unique:home_user,phone',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '用户名没写',
            'username.unique'  => '用户已存在',
            'username.regex'  => '用户名格式不对',
            'pass.required'  => '密码没写',
            'pass.regex'  => '密码格式不对',
            'repass.same'  => '密码不相同',
            'email.required'  => '邮箱没写',
            'email.unique'  => '邮箱已存在',
            'email.email'  => '邮箱格式不对',
            'phone.required'  => '手机号没写',
            'phone.unique'  => '手机号已存在',
        ];
    }
}
