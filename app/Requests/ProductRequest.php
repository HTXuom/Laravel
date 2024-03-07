<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
 protected function prepareForValidator($validator){
   // $validator->after(function ($validator){
   //    // if($this->somethingElseIsInvalid()){
   //    //       $validator->error()->add('msg','đã xảy ra lỗi vui lòng kiểm tra');
   //    // }
   //    if ($validator->errors()->count()>0){
   //          $validator->errors()->add('msg', 'đã xảy ra lỗi vui lòng kiểm tra');
   //    }
   
   // });
   $this->merge([
      'create_at'=>date('Y-M-D H:i:s')
   ]);
 }
 protected function failedAuthorization(){
    
   throw new HttpResponseException(abort(404));
 }
 
 
}
