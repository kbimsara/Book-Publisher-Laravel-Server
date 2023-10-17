<?php

use App\Http\Controllers\Api\V1\AdminController;
use App\Http\Controllers\Api\V1\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//getBook data
// Route::group(['prefix'=>'v1'],function(){
//     Route::apiResource('user',AdminController::class);
// });
Route::get('user', [AdminController::class,'index']);
Route::get('user/{id}', [AdminController::class,'view']);
Route::get('user/mail/{email}', [AdminController::class,'login']);
Route::post('user', [AdminController::class,'store']);
Route::put('user/{id}', [AdminController::class,'update']);
Route::delete('user/{id}', [AdminController::class,'delete']);

//get Book data
// Route::group(['prefix' => 'v1'], function () {
//     Route::apiResource('book', BookController::class);
// });

Route::get('book', [BookController::class,'index']);
Route::get('book/{id}', [BookController::class,'view']);
Route::get('book/2/{id}', [BookController::class,'view2']);
Route::get('book/tot/{id}', [BookController::class,'totView']);
Route::post('book', [BookController::class,'store']);
Route::post('book/upload', [BookController::class,'upload']);
Route::put('book/{id}', [BookController::class,'update']);
Route::delete('book/{id}', [BookController::class,'delete']);