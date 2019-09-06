<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Redirect;

class IndexController extends Controller
{


    //首页
    public function index(){
        // dd(Auth::guard('admin')->check());
        return view('admin.index.index');
    }


    //首页，框架页面
    public function welcome(){
        return view('admin.index.welcome');
    }
}
