<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Member;
use Input;
use DB;

class MemberController extends Controller
{
    //列表展示
    public function index(){
        //查询数据
        $data = Member::all();
        //展示视图
        return view('admin.member.index',compact('data'));
    }

    //添加会员
    public function add(){
        //判断请求类型
        if(Input::method() == 'POST'){
            //实现数据的保存
            //自动验证
            $result = Member::insert([
                'username' => Input::get('username'),
                'password' => bcrypt('password'),
                'gender' => Input::get('gender'),
                'mobile' => Input::get('mobile'),
                'email' => Input::get('email'),
                'avatar' => '/images/avatar/th.jpg',
                'country_id' => Input::get('country_id'),
                'province_id' => Input::get('province_id'),
                'city_id' => Input::get('city_id'),
                'county_id' => Input::get('county_id'),
                'type' => Input::get('type'),
                'status' => Input::get('status'),
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            return $result ? 1:0;
        }else{
            //查询数据
            $country = DB::table('area')->where('pid','0')->get();
            //展示视图
            return view('admin.member.add',compact('country'));
        }
    }

    //ajax四级联动获取下属地区
    public function getAreaById(){
        //接收id
        $id = Input::get('id');
        //根据id去查询下属地区
        $data = DB::table('area')->where('pid',$id)->get();
        return $data;
    }
}
