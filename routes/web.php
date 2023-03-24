<?php

use App\Http\Controllers\frontendController;
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

Route::get('/',[frontendController::class,'home'])->name('home');
Route::get('create',[frontendController::class,'create'])->name('create');
Route::post('save',[frontendController::class,'save'])->name('save');
Route::get('read',[frontendController::class,'read'])->name('read');
Route::get('edit/{id}',[frontendController::class,'edit'])->name('edit');
Route::post('update',[frontendController::class,'update'])->name('update');
Route::get('delete/{id}',[frontendController::class,'delete'])->name('delete');
Route::get('search',[frontendController::class,'search'])->name('search');
Route::get('searchx',[frontendController::class,'searchx'])->name('searchx');