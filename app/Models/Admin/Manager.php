<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

//引入trait
use Illuminate\Auth\Authenticatable;

class Manager extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    // 绑定数据表
    protected $table = 'manager';

    //使用trait，就相当于将trait代码段复制到这个位置
    use Authenticatable;

}
