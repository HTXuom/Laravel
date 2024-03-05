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

    public function downloadImage(Request $request){
        if(!empty($request->image)){
            $image = trim($request->image);
            $fileName ='image_'.uniqid().'.jpg';
            return response()->streamDownload(function()use($image){
                $imageContent = file_get_contents($image);
                echo $imageContent;

            }.$fileName);
            return response()->download ($image,$fileName);
        }
        
    }
    public function downloadDoc(Request $request)
    {
        if (!empty($request->file)) {
            $file= trim($request->file);
            $fileName = 'tai_lieu' . uniqid() . '.pdf';
            return response()->streamDownload(function () use ($file) {
                $imageContent = file_get_contents($file);
                echo $imageContent;
            } . $fileName);

            $headers=[
                'content-Type'=>'application/pdf'
            ];
            return response()->download($file, $fileName);
        }
    }
}
