<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Question;
use Excel;

class QuestionController extends Controller
{
    //列表方法
    public function index(){
        //获取数据
        $data = Question::get();
        //展示视图
        return view('admin.question.index',compact('data'));
    }


    //导出
    public function export(){
        $cellData = [
            ['序号','题干','所属试卷','分值','选项','正确答案','添加时间'],
        ];
        //查询数据
        $data = Question::all();
        foreach($data as $key=>$value){
            $cellData[] = [
                $value->id,
                $value->question,
                $value->paper->paper_name,
                $value->score,
                $value->options,
                $value->answer,
                $value->created_at,
            ];
        }
        Excel::create(sha1(time().rand(1000,9999)),function($excel) use ($cellData){
            $excel->sheet('题库', function($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->export('xls');
    }

    //导入
    public function import(){

    }
}
