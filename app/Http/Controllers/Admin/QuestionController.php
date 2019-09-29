<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Question;
use Excel;
use Input;

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
        //判断请求的类型
        if(Input::method() == 'POST'){
            //数据的导入
            $filePath =  Input::get('excelpath');//文件的路径
            Excel::load($filePath, function($reader) {
                $data = $reader->getSheet(0)->toArray();
                //读取全部的数据
                $temp = [];
                foreach($data as $key => $value){
                    //排除表头
                    if($key == '0'){
                        //跳出本次循环
                        continue;
                    }
                    //此时value是数组
                    $temp[] = [
                        'question' => $value[0],
                        'paper' => Input::get('paper_id'),
                        'score' => $value[3],
                        'options' => $value[1],
                        'answer' => $value[2],
                        'created_at' =>date('Y-m-d H:i:s')
                    ];
                }
            });
            $result = Question::insert($temp);
            echo $result? '1' : '0';
        }else{
            //查询试卷列表
            $data = \App\Models\Admin\Paper::get();
            return view('admin.question.import',compact('data'));
        }
    }
}
