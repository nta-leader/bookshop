<?php

namespace App\Http\Requests\Admin\Category;

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
            'parent_id'=>'required',
            'name'     =>'required|max:255'
        ];
    }
    public function messages(){
        return [
            'parent_id.required'=>'Vui lòng chọn danh mục cha !',
            'name.required'     =>'Vui lòng nhập tên danh mục !',
            'name.max'          =>'Tên danh mục tối đa 255 ký tự !'
        ];
    }
}
