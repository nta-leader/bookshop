<?php

namespace App\Http\Requests\Admin\Product;

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
            'name'=>'required|max:255|unique:product,name',
            'product_code'=>'required|max:255|unique:product,product_code',
            'link_document'=>'required',
            'picture'=>'required|image',
            'content'=>'required',
            'evaluate'=>'required',
            'basis_price'=>'required',
            'active'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Vui lòng nhập tên sản phẩm !',
            'name.max'=>'Tên sản phẩm tối da 200 ký tự !',
            'product_code.required'=>'Vui lòng nhập mã sản phẩm !',
            'product_code.max'=>'Mã sản phẩm tối đa 200 ký tự !',
            'product_code.unique'=>'Mã sản phẩm đã tồn tại !',
            'link_document.required'=>'Vui lòng nhập link đọc thử !',
            'picture.required'=>'Vui lòng chọn một hình ảnh !',
            'picture.image'=>'Vui lòng chọn đúng định dạng file hình ảnh !',
            'content.required'=>'Vui lòng nhập chi tiết cho sản phẩm !',
            'evaluate.required'=>'Vui lòng dánh giá sản phẩm !',
            'basis_price.required'=>'Vui nhập giá sản phẩm !',
            'active.required'=>'Vui lòng chọn trạng thái cho sản phẩm !'
        ];
    }
}