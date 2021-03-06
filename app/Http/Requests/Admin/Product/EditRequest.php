<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

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
    public function rules(Request $request)
    {
        return [
            'name'=>'required|max:255|unique:product,name,'.$request->id.',id',
            'product_code'=>'required|max:255|unique:product,product_code,'.$request->id.',id',
            'link_document'=>'required',
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
            'content.required'=>'Vui lòng nhập chi tiết cho sản phẩm !',
            'evaluate.required'=>'Vui lòng dánh giá sản phẩm !',
            'basis_price.required'=>'Vui nhập giá sản phẩm !',
            'active.required'=>'Vui lòng chọn trạng thái cho sản phẩm !'
        ];
    }
}
