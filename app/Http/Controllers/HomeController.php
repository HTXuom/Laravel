<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return 'Home';
    }
    public function getNews()
    {
        return 'Danh scahs tin tức';
    }
    public function getCategories($id)
    {
        return 'Chuyên mục:' . $id;
    }
}
