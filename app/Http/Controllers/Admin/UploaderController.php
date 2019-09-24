<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class UploaderController extends Controller
{
    public function webuploader(Request $request){

        //判断是否有文件上传成功
        if($request -> hasFile('file') && $request->file('file')->isValid()){
            //有文件上传
            $fileName = sha1(time() . $request -> file('file') -> getClientOriginalName()) . '.' . $request-> file('file') -> getClientOriginalExtension();

            //文件的保存
            Storage::disk('public') -> put($filename,file_get_contents($request->file('file') ->path()));

            //返回数据
            $result = [
                'errCode'  =>   '0',
                'errMsg'   =>    '',
                'succMsg'  =>    '文件上传成功',
                'path'     =>    '/storage/'.$fileName,
            ];
        }else{
            //没有文件被上传或出错
            $result = [
                'errCode'   =>  '000001',
                'errMsg'    =>   $request->file('file')->getErrorMessage(),
            ];
        }

        //返回信息
        return response() -> json($result);
    }
}
