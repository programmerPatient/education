<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Member;

class MemberController extends Controller
{
    //列表展示
    public function index(){
        //查询数据
        $data = Member::all();
        //展示视图
        return view('admin.member.index',compact('data'));
    }
}
