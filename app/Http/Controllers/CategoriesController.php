<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{




    public function index(Request $request)
    {
        // if (isset($_GET['id'])){
        //     echo $_GET['id'];
        // }

        // $path =$request->path();
        // echo  $path;

        // $url =$request->url();
        // $fullUrl = $request->fullUrl();
        // echo $fullUrl;

        // $method =$request->method();
        // echo $method;

        // $ip= $request->ip();
        // echo "ip là:".$ip;

        //     if($request->isMethod('GET')){
        //         echo "phương thức get";

        // }
        // $serve =$request->serve();
        // dd($serve['REQUEST_URL']);

        // $header =$request->header('user-agent');

        // dd($header);

        // $id=$request->input('id');

        // echo $id;
        // $id=$request->input('id,m.name');

        // $id=$request->id;
        // $name =$request->name;

        //  dd($id);

        $name = request('name', 'Unicode');
        dd($name);

        return view('client/category/list');
    }
    // Lấy ra 1 chuyên mục theo id (phương thức get)

    public function getCategory($id)
    {
        return ('client/category/edit');
    }

    // Sửa 1 chuyên mục (phương thức get)
    public function updateCategory($id)
    {
        return 'Submit sửa chuyên mục:' . $id;
    }
    //Show form thêm dữ liệu (phuong thức get)
    public function addCategory(Request $request)
    {
        // $path = $request->path(̣);
        // echo $path;

        return view('client/category/add');
    }
    public function handleAddCategory()
    {
        print_r($_POST);
    }
    public function deleteCategory($id)
    {
        return 'Submit xóa chuyên mục :' . $id;
    }

    public function getFile()
    {
        return view('clients/categories/file');
    }


    public function handleFile(Request $request)
    {
        // $file = $request->file('photo');
        if ($request->hasFile('photo')) {
            if ($file = $request->isValid()) {
                $file = $request->phpto;
                // $path = $file->path();
                $ext = $file->path();
                // $path = $file->store('file-txt', 'local');
                // $path = $file->storeAs('file', 'khoa hoc.txt');

                // $fileName = $file->getClientOriginalName();

                //đổi tên 

                $fileName = md5(uniqid()) . '.' . $ext;
                dd($fileName);
            } else {
                return 'update không thành công';
            }
        } else {
            return 'vui lòng chọn file';
        }
    }
}
