<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';

    public function profession(){
        return $this->hasOne('App\Models\Admin\Profession','id','profession_id');
    }
}
