<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Course;

class CourseController extends Controller
{
    public function index(){
        //获取数据
        $data = Course::orderBy('sort','desc')->get();
        //展示视图
        return view('admin.course.index',compact('data'));
    }
}
