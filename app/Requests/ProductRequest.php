<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ProductRequest extends FormRequest
{
    public function authorize(){
        return true;
    }



 public function rules(){
    return [

            'product_name' => 'required/min:6',
            'product_price' => 'required/integer'
    ];

 }

 public function mesage(){
    return [
            'product_name.required' => 'Tên sản phẩm bắt buộc phải nhập',
            'product_price.min' => 'Tên sản phẩm không được ngỏ hơn:min ký tự',
            'product_price.required'=>'Gía sản phẩm bắt buộc phải nhập',
            'product_price.integer' => 'Trường : attribute phải là số'
    ];
 }
 public function attributes(){
    return [
        'product_name'=>'tên sản phẩm',
            'product_price'=>'giá sản phẩm'
    ];
 }
}
