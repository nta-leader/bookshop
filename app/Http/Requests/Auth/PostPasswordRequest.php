<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class PostPasswordRequest extends FormRequest
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
            'password'=>'required|min:8',
            'passwordNew'=>'required|min:8',
            'rPasswordNew'=>'required|min:8|same:passwordNew'
        ];
    }
    public function messages()
    {
        return [
            'password.required'=>'Vui lòng nhập mật khẩu !',
            'password.min'=>'Mật khẩu tối thiểu 8 ký tự !',
            'passwordNew.required'=>'Vui lòng nhập mật khẩu !',
            'passwordNew.min'=>'Mật khẩu tối thiểu 8 ký tự !',
            'rPasswordNew.required'=>'Vui lòng nhập mật khẩu !',
            'rPasswordNew.min'=>'Mật khẩu tối thiểu 8 ký tự !',
            'rPasswordNew.same'=>'Mật khẩu mới không khớp !'
        ];
    }
}