<?php

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
use App\Http\Controllers\Admin\NewsController;
Route::controller(NewsController::class)->prefix('admin')->group(function(){
    route::get('news/create','add')->middleware('auth');
});
use App\Http\Controllers\Admin\ProfileController;    
Route::controller(ProfileController::class)->prefix('admin')->group(function () {
    Route::get('profile/create', 'add')->middleware('auth');
    Route::get('profile/edit', 'edit')->middleware('auth');
});
// //use App\Http\Controllers\Admin\ProfileController;
// Route::controller(ProfileController::class)->prefix('admin')->group(function(){
//     route::get('profile/create','add');
//     route::get('profile/edit','edit');
// });
// Route::get('admin/profile/create','ProfileController@add');
// Route::get('admin/profile/edit','ProfileController@edit');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
