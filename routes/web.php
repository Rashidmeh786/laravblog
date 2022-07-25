<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('layout', function () {
    return view('customAuth\master');
});

Route::group(['middleware'=>'auth'],function () {

    Route::get('/dashboard', function () {
        return view('backend.dashboard');
    });

    //Route::get('/category','CategoryController@index');
   Route::get('/categories', [CategoryController::class, 'index']);
   //Route::get('/categories','App\Http\Controllers\CategoryController@index');


  // Route::post('/addCategory', [CategoryController::class, 'create'])->name('route_name');
   Route::post('/addCategory','App\Http\Controllers\CategoryController@create')->name('addCategory');
   Route::post('/getAllCategories','App\Http\Controllers\CategoryController@getAllCategories');
   Route::get('/getCategory/{id}','App\Http\Controllers\CategoryController@getCategory');
   Route::put('/UpdateCategory/{id}', [CategoryController::class, 'UpdateCategory']);
   Route::get('/deleteCategory/{id}', [CategoryController::class, 'deleteCategory']);


//    add tags
Route::get('/Tags', [TagController::class, 'index']);
Route::Post('/addTag', [TagController::class, 'create']);
Route::post('/getAllTags','App\Http\Controllers\TagController@getAllTags');
Route::get('/getTag/{id}','App\Http\Controllers\TagController@getTag');
Route::put('/UpdateTag/{id}', [TagController::class, 'UpdateTag']);
Route::get('/deleteTag/{id}', [TagController::class, 'deleteTag']);

                //blogs


                Route::get('/Blogs', [BlogController::class, 'index']);
                Route::get('/CreateBlog', [BlogController::class, 'CreateBlogView']);
                Route::post('/BlogCreate',[BlogController::class, 'Create']);
                Route::post('/getAllBlogs',[BlogController::class, 'getAllBlogs']);






});



// frontend

Route::get('/master', function () {
    return view('frontend.layout.master');
});
Route::get('/', function () {
    return view('frontend.blog');
});

Route::get('/about', function () {
    return view('frontend.about');
});
Route::get('/contact', function () {
    return view('frontend.contact');
});
Route::get('/blogdetail', function () {
    return view('frontend.blog-detail');
});





