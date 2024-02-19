<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $html = '<h1>Học Lập Trình Tại Unicode </h1>';
    return $html;
});
// Route::get('/unicode',function(){
//     return view('form');
// // return 'Phương thức post của /unicode'; 
// });
// Route::get('/unicode', function (){
//     return 'Phương thức post của /unicode'; 
// });
// Route::post('/unicode',function(){
//     return 'Phương thức post của /unicode';
// });
// Route::put('unicode', function(){
//     return 'Phương thức Put của path /unicode';
// });
// Route::delete('unicode', function () {
//     return 'Phương thức delete của path /unicode';
// });
// Route::patch('unicode', function () {
//     return 'Phương thức patch của path /unicode';
// });
// Route::match(['get','post'],'unicode',function(){
//     return $_SERVER['REQUEST_METHOD'];
// });
// Route::any('unicode',function(Request $request ){

//         return $request->method();
// });
// Route::get('show-form',function(){
//     return view('form');
// });
// Route::redirect('unicode','show-form',404);
// Route::view('show-form','form');
Route::prefix('admin')->group(function () {
    Route::get('/unicode', function () {
        return 'Phương thức Get của path của /unicode';
    });
    Route::get('show-form', function () {
        return view('form');
    });
    Route::prefix('products')->group(function () {
        Route::get('/', function () {
            return 'Danh sách sản phẩm';
        });
        Route::get('add', function () {
            return 'Thêm Sản Phẩm';
        });
        Route::get('edit', function () {
            return 'Sửa Sản Phẩm';
        });
        Route::get('delete', function () {
            return 'Xóa Sản Phẩm';
        });
    });
});
