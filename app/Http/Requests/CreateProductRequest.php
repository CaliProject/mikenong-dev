<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class CreateProductRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:50',
            'contact_name' => 'required|max:255',
            'phone' => 'required|max:15',
            'cellphone' => 'max:15',
            'email' => 'required|max:255',
            'release_date' => 'required|max:30',
            'address' => 'required'
        ];
    }

    /**
     * Error messages for flashing
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => '标题不能为空',
            'title.max' => '标题字数不能大于50',
            'contact_name.required' => '联系姓名不能为空',
            'phone.required' => '联系电话不能为空',
            'cellphone.required' => '手机号码不能为空',
            'email.required' => '电子邮箱不能为空',
            'release_date.required' => '上市时间不能为空',
            'address.required' => '地址不能为空'
        ];
    }
}
