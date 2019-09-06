<?php

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

//后台路由
Route::group(['prefix' => 'admin'],function(){
    //后台登陆页面
    Route::get('public/login','Admin\PublicController@login');
    //后台退出地址
    Route::get('public/logout','Admin\PublicController@logout');

    //后台登陆处理页面
    Route::post('public/check','Admin\PublicController@check');

    //后台首页的路由
    Route::get('index/index','Admin\IndexController@index');
    Route::get('index/welcome','Admin\IndexController@welcome');
});
