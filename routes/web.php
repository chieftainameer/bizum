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

Route::get('/pay',[App\Http\Controllers\BizumController::class,'index']);
Route::get('ok',function(){
    echo "exito exito exito ";
});
Route::get('ko',function(){
    echo "fucked up, failed";
});

Route::get('notif',function(){
    echo "here is the notif";
});
