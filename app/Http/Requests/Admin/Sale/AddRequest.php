<?php

namespace App\Http\Requests\Admin\Sale;

use Illuminate\Foundation\Http\FormRequest;

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
            'name'=>'required|max:255',
            'picture'=>'required|image',
            'percent'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Vui lòng nhập tên sản phẩm !',
            'name.max'=>'Tên sản phẩm tối da 200 ký tự !',
            'picture.required'=>'Vui lòng chọn một hình ảnh !',
            'picture.image'=>'Vui lòng chọn đúng định dạng file hình ảnh !',
            'percent.required'=>'Vui lòng chọn mốc sale !'
        ];
    }
}