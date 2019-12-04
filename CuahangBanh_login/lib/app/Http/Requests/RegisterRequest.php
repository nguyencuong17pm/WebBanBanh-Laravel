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
            'taikhoan'=>'unique:db_users,name',
            'email'=>'unique:db_users,email'
        ]; 
    }

    public function messages()
    {
        return [
            'taikhoan.unique'=>'Tài khoản đã tồn tại vui lòng nhập tài khoản khác !',
            'email.unique'=>'Email đã tồn tại vui lòng nhập Email khác !'

        ];
    }

     
}
