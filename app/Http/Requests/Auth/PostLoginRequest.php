<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class PostLoginRequest extends FormRequest
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
            'username'=>'required|min:5',
            'password'=>'required|min:8'
        ];
    }
    public function messages()
    {
        return [
            'username.required'=>'Vui lòng nhập tài khoản !',
            'username.min'=>'Tài khoản tối thiểu 5 ký tự !',
            'password.required'=>'Vui lòng nhập mật khẩu !',
            'password.min'=>'Mật khẩu tối thiểu 8 ký tự !'
        ];
    }
}
