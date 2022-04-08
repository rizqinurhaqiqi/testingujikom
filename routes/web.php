<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\userController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerjalananController;

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
    return view('auth.login');
});
Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/postlogin',[AuthController::class, 'postLogin']);
Route::get('/logout',[AuthController::class, 'logout']);
Route::get('/formregis',[AuthController::class, 'formregis']);
Route::post('/storeregis',[AuthController::class, 'regis']);
Route::get('/home',[AuthController::class, 'home']);

Route::group(['middleware'=>['auth','CheckRole:admin']],function()
{
    Route::get('/admin','adminController@index');
    Route::get('/admin/delete/{id}','adminController@delete');
    Route::get('/admin/cetak/user_pdf','adminController@cetakUser');
});
Route::group(['middleware'=>['auth','CheckRole:user']],function(){
    Route::get('/dashboard','DashboardController@index');
    Route::get('/perjalanan','PerjalananController@index');
    Route::post('/perjalanan/create','PerjalananController@index');
    Route::get('/perjalanan/delete/{id}','PerjalananController@delete');
    Route::get('/profile','userController@index');
    Route::post('/profile/edit/{id}','userController@update');
});
