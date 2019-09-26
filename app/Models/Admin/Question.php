<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table ='question';

    //关联Paper模型
    public function course(){
        return $this->hasOne('App\Models\Admin\Paper','id','paper_id');
    }
}
