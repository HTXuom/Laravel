<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $data = [];
    public function index()
    {
        $this->data['welcome'] = 'học lập trình Laravel tại <b> Unicode</b>';
        $this->data['content'] = '<h3> chương 1: nhập môn lập trình</h3>
        <p> kiến thức 1</p>
         <p> kiến thức 2</p>
          <p> kiến thức 3</p>
        ';



        $this->data['index'] = 1;
        $this->data['dataArr'] = [];
        $this->data['check'] = true;


        return view('home', $this->data);
    }
}
