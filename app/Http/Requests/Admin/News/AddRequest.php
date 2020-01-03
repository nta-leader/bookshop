<?php

namespace App\Http\Requests\Admin\News;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AddRequest extends FormRequest
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
            'name'=>'required|max:255|unique:product,name',
            'picture'=>'required|image',
            'content'=>'required',
            'active'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Vui lòng nhập tên sản phẩm !',
            'name.max'=>'Tên sản phẩm tối da 200 ký tự !',
            'picture.required'=>'Vui lòng chọn một hình ảnh !',
            'picture.image'=>'Vui lòng chọn đúng định dạng file hình ảnh !',
            'content.required'=>'Vui lòng nhập chi tiết cho sản phẩm !',
            'active.required'=>'Vui lòng chọn trạng thái cho sản phẩm !'
        ];
    }
}
