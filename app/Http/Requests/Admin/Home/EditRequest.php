<?php

namespace App\Http\Requests\Admin\Home;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'name'=>'required|max:200',
            'address'=>'required|max:200',
            'work_time'=>'required',
            'phone'=>'required|max:20',
            'email'=>'required|email',
            'facebook'=>'required|max:255',
            'about'=>'required',
            'shopping_guide'=>'required',
            'guarantee'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Vui lòng nhập tên công ty, group !',
            'name.max'=>'Tên công ty tối đa 200 ký tự !',
            'address.required'=>'Vui lòng nhập địa chỉ !',
            'address.max'=>'Địa chỉ tối đa 200 ký tự !',
            'work_time.required'=>'Vui lòng nhập thời gian làm việc !',
            'phone.required'=>'Vui lòng nhập số điện thoại !',
            'phone.max'=>'Số điện thoại tối da 20 ký tự !',
            'email.required'=>'Vui lòng nhập email !',
            'email.email'=>'Nhập đúng định dạng email !',
            'facebook.required'=>'Vui lòng nhập link facebook !',
            'facebook.max'=>'Link facebook tối đa 255 ký tự !',
            'about'=>'Vui lòng viết bài giới thiệu !',
            'shopping_guide'=>'Vui lòng viết bài hướng dẫn mua hàng !',
            'guarantee'=>'Vui lòng viết bài chính sách !'
        ];
    }
}
