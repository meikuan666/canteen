<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/***
 * 后台接口
 */
Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function (){
    //后台登陆


    //购物袋接口
    Route::resource('bags','BagController')->except('create','edit');
});