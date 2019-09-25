<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Protype;

class ProtypeController extends Controller
{
    //列表
    public function index(){
        //按sort由大到小获取数据
        $data = Protype::orderBy('sort','desc') -> get();
        //展示试图
        return view('admin.protype.index',compact('data'));
    }
}
