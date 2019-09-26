<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Question;

class QuestionController extends Controller
{
    //列表方法
    public function index(){
        //获取数据
        $data = Question::get();
        //展示视图
        return view('admin.question.index',compact('data'));
    }
}
