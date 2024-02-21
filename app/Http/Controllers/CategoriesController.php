<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function _construct()
    {
    }
    // hiện thị danh sách chuyên mục phương thức get
    public function index()
    {
        return view('clients/categories/list');
    }
    // lấy ra một chuyên mục id
    public function getCategory($id)
    {
        return view('clients/categories/edit');
    }
    // sửa một chuyên mục (phuong thức get)
    public function updateCategory($id)
    {
        return 'Submit sửa chuyên mục' . $id;
    }
    // show form thêm dữ liệu (phương thức get)
    public function showCategory($id)
    {
    }
    // thêm dữ liệu vào chuyên mục 

    public function handleAddCategory()
    {
        redirect(route('categories.add'));
        return 'Submit thêm chuyên mục';
    }


    // thêm dữa liệu vào chuyên mục (phuong thức post)
    public function addCategory()
    {
        return view('clients/categories/add');
    }
    public function deleteCategory($id)
    {
        return 'Submit xóa  chuyên mục:' . $id;
    }
}
