<?php

use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\Admin\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
// route::get('/tin-tuc', 'HomeController@getNews')->name('new');
// route::get('/chuyen-muc/{id}',[HomeController::class,'getCategories'] );
// Route::prefix('admin')->group(function () {
//     Route::get('tin-tuc/{$id?}/{slug?}.html', function ($id=null, $lug=null) {
//         $content ='Phương thức Get của path của /unicode với tham số:';
//         $content.='id = '.$id.'<br/>';
//         $content .= 'slug = ' . '$slug';
//         return $content;
//     })->Where('id', '\d+')->Where('slug','.+')->name('admin.tintuc');

//     Route::get('show-form', function () {
//         return view('form');
//     })->name('admin.show-form');

//     Route::prefix('products')->middleware('CheckPermission')->group(function () {
//         Route::get('/', function () {
//             return 'Danh sách sản phẩm';
//         })->name('admin.products.add');
//         Route::get('add', function () {
//             return 'Thêm Sản Phẩm';
//         });
//         Route::get('edit', function () {
//             return 'Sửa Sản Phẩm';
//         });
//         Route::get('delete', function () {
//             return 'Xóa Sản Phẩm';
//         });
//     });
// });

// Route::prefix('categories')->group(function () {
//     //   danh sách chuyên mục
//     Route::get('/', [CategoriesController::class, 'index'])->name('categories.list');
//     //   Lấy chi tiết một chuyên mục (áp dụng show form một chuyên mục )
//     Route::get('/edit/{id}', [CategoriesController::class, 'getCategory'])->name('categories.edit');;
//     //   Xử lý update chuyên mục 
//     Route::post('/edit/{id}', [CategoriesController::class, 'updateCategory']);
//     // hiện thị form add dữ liệu 
//     Route::get('/add', [CategoriesController::class, 'addCategory'])->name('categories.add');;
//     //   xử lý hêm chuyên mục
//     Route::post('/add', [CategoriesController::class, 'handleAddCategory']);
//     // xóa chuyên mục
//     Route::delete('/delete/{id}', [CategoriesController::class, 'deleteCategory'])->name('categories.delete');;
// });
//  admin route
Route::prefix('admin')->group(function () {

    // Route::resource('/products',[PhotoController::class,]);

});
Route::get('/', function () {
    return '<h1 style="text-align:center:">Trang chủ unicode<\h1>';
});
Route::middleware('auth.admin')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
});
