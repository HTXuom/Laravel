<?php

use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController;
// use App\Http\Controllers\ UsersController;

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Http\Response;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/san-pham', [HomeController::class, 'Products'])->name('product');

Route::get('/them-san-pham', [HomeController::class, 'getAdd']);
Route::get('/themsan-pham', [HomeController::class, 'postAdd'])->name('post-add');


Route::get('/', function () {
    return 'học lập trình ';
});
Route::puy('/them-san-pham',[HomeController::class, 'putAdd']);
Route::get('/lay-thong-tin', [HomeController::class, 'getArr']);
// Route::puy('lay-thong-tin', [HomeController::class, 'putArr']);
// Route::get('demo-response', function () {
//     return view('học lập trình ');
// });

// Route::get('demo-request-2',function (Request $request){
//     $request =(new Request ())->cookie('unicode','Trang PHP -Laravel',30);
//     return $request ;
// });
// Route::get('demo-request-2', function (Request $request) {
//     return $request = (new Request())->cookie('unicode', 'Trang PHP -Laravel', 30);
// });

// Route::get('demo-response',function(){
//     // return 'học laravel tại unicode';
//     $contentArr =[
//         'name' => 'laravel 8.x',
//         'lesson'=>'khóa học lập trình laravel',
//         'academy'=> 'unicode Acdemy'
//     ];
//     return $contentArr;

// })

Route::get('demo-response', function () {
   
   return view('clents.demo-test');


   
})->name('demo-response');


Route::post('demo-response', function (Request $request) {

    if (!empty ($request->usename)){
        return back()->wittInput()->with('mess','Validate không thganhf công');

    }

    return redirect(route('demo-response'))->with('mess','Validate không thganhf công');
});

// Route::get('demo-response', function () {

//     $response = response()->view('clients.demo-test', [
//         'title' => 'học lập trình tại unicode'
//     ])->header('Content-Type', 'application/json')
//         ->header('API-Key', '123456');

//     return $response;
// });
 Route::get('download-image/{link}',[HomeController::class,'downloadImage'])->name('download-image');

//  Route::prefix('users')->group(function(){
//    Route::get('/',[UsersController::class,'index']);
//  });
