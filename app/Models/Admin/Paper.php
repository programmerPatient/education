<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $table = 'paper';

    //关联Course模型
    public function course(){
        return $this->hasOne('App\Models\Admin\Course','id','course_id');
    }
}
