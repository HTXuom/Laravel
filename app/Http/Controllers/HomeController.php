<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $data = [];
    public function index()
    {
        $this->data['title'] = 'đào tạo lập trình web';
        return view('clients.home', $this->data);
    }
    public function products()
    {
        $this->data['title'] = 'sản phẩm';
        return view('clients.home', $this->data);
    }
    public function getAdd(){
        $this->data['title'] ='thêm sản phẩm';
        return view('clients.add', $this->data);

    }
   function postAdd(Request $request){
        dd($request);
         
    }
     public function putAdd(Request $request){
        return 'phuogw thức put ';
        dd($request);


         
    }
    public function putArr(Request $request)
    {

        $contentArr=[
              'name'=>'laravel 8.x',
            'lesson' => ' khóa học lập trình laravel laravel ',
            'name' => 'unicode Academy ',
        ];


        return $contentArr;
    }
}
