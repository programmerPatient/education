<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    //登陆界面的展示
    public function login(){

        // 该页面使用H_ui.admin模板自动生成，需要到该网站下下载对应的代码，然后在public目录下引入他的静态资源，然后在视图文件中引入你需要的界面的代码，当前页面引入login.html的代码,并修改页面的资源引入路径为自己刚才引入资源后的资源路径
        return view('admin.public.login');
    }


    //后台登录验证
    public function check(Request $request){

        //开始自动验证
        $this -> validate($request,[
            //验证语法  需要验证的字段名 => "验证规则1|验证规则2...."
            'username' => 'required|min:2|max:20',
            'password' => 'required|min:6',
            'captcha' => 'required|size:4|captcha'
        ]);

    }
}
