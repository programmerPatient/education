<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $table = 'profession';


    //定义与protype的关联模型（一对一的关系）
    public function protype(){
        return $this->hasOne('App\Models\Admin\Protype','id','protype_id');
    }
}
