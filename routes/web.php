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
    Route::get('public/login','Admin\PublicController@login')->name('login');
    //后台退出地址
    Route::get('public/logout','Admin\PublicController@logout');

    //后台登陆处理页面
    Route::post('public/check','Admin\PublicController@check');

});

//需要认证的后台路由
Route::group(['prefix' => 'admin','middleware' => ['admin.auth','checkrbac']],function(){

    //后台首页的路由
    Route::get('index/index','Admin\IndexController@index');
    Route::get('index/welcome','Admin\IndexController@welcome');

    //管理员的管理模块
    Route::get('manager/index','Admin\ManagerController@index');

    //权限的管理模块
    Route::get('auth/index','Admin\AuthController@index');
    Route::any('auth/add','Admin\AuthController@add');

    //角色的管理模块
    Route::get('role/index','Admin\RoleController@index');
    Route::any('role/assign','Admin\RoleController@assign');
    Route::any('role/add','Admin\RoleController@add');

    //会员模块
    Route::get('member/index','Admin\MemberController@index');
    Route::any('member/add','Admin\MemberController@add');
        //异步头像上传
    Route::post('uploader/webuploader','Admin\UploaderController@webuploader');
    //异步四级联动数据获取
    Route::get('member/getAreaById','Admin\MemberController@getAreaById');//ajax联动

    //专业分类的列表
    Route::get('protype/index','Admin\ProtypeController@index');
    Route::get('profession/index','Admin\ProfessionController@index');
    Route::post('uploader/qiniu','Admin\UploaderController@qiniu');//七牛云上传

    //课程与点播课程的管理
    Route::get('course/index','Admin\CourseController@index');
    Route::get('lesson/index','Admin\LessonController@index');
    Route::get('lesson/play','Admin\LessonController@play');

    //试卷试题管理部分
    Route::get('paper/index','Admin\PaperController@index');
    Route::get('question/index','Admin\QuestionController@index');
    Route::any('question/export','Admin\QuestionController@export');
    Route::any('question/import','Admin\QuestionController@import');

    //直播管理
    Route::get('live/index','Admin\LiveController@index');
    Route::get('stream/index','Admin\StreamController@index');
    Route::any('stream/add','Admin\StreamController@add');
});



