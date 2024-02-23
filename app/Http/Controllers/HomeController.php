<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'học lập trình web tại unicode';
        $content = 'học lập trình Laravel 8.x tại unicode';
        // [
        //     'title'=>$title,
        //     'content'=>$content
        // ]
        // compact('title','content')

        // return view('home')->with(['title'=>$title, 'content'=>$content]);
        // return View::make('home')->with(['title' => $title, 'content' => $content]);

        // $contenView = view('home')->render();
        // $contentView = $contentView->render();
        // dd($contentView);


    }
    public function getNews()
    {
        return 'Danh scahs tin tức';
    }
    public function getCategories($id)
    {
        return 'Chuyên mục:' . $id;
    }
    public function getProductDetail($id)
    {
        // return $id;
        return view('clients.products.detail', compact('id'));
    }
}
