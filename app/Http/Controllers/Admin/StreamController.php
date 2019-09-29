<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Stream;

class StreamController extends Controller
{
    public function index(){
        //获取数据
        $data = Stream::orderBy('sort','desc')->get();

        return view('admin.stream.index',compact('data'));
    }
}
