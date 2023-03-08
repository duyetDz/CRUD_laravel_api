<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/hello', function () {
    return 'Hello World';
});

// Route::get('/about', function () {
//     return view('about');
// });

Route::get('/about', 'UserController@index');

// Route::get('/about', function () {


//     return view('about');
// });


Route::get('/new', function () {
    return view('new');
});

Route::get('/product', function () {
    return view('product');
});


Route::get('/tpl_default', function () {
    return view('templates/tpl_default');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin', function () {
    return view('admin/index');
})->middleware('checklogin::class');

Route::get('/admin/create', 'PostController@showform')->name('/admin/create');

Route::post('/admin/create', 'PostController@validationform')->name('/admin/create');

Route::get('/admin/news_create', 'Admin\AdminNewsController@create');

Route::patch('/admin/news/store', 'Admin\AdminNewsController@store');

Route::get('/admin/news', 'Admin\AdminNewsController@index');

Route::get('/admin/news/{id}', 'Admin\AdminNewsController@show');

Route::get('/admin/news/edit/{id}', 'Admin\AdminNewsController@edit');

Route::patch('/admin/news/update/{id}', 'Admin\AdminNewsController@update');

Route::DELETE('/admin/news/delete/{id}', 'Admin\AdminNewsController@destroy');