<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductControler;
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

Auth::routes();

Route::get('/test', [App\Http\Controllers\HomeController::class, 'index'])->name('test');
Route::get('/insert', [ProductControler::class, 'index']);
Route::post('/insert', [ProductControler::class, 'insert']);
Route::get('/home', [ProductControler::class, 'view']);
Route::get('/view/edit/{id}',[ProductControler::class, 'edit']);
Route::post('/view/update',[ProductControler::class, 'update']);
Route::post('/delete',[ProductControler::class, 'delete']);

