<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profession', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pro_name',20) -> notNull();//专业名称
            $table->tinyInteger('protype_id') -> notNull();//专业分类id
            $table->string('teachers_ids') -> notNull();//老师id
            $table->string('description');//描述
            $table->string('cover_img');//图片
            $table->integer('view_count') -> notNull() -> default('500');//访问量
            $table->timestamps();
            $table->tinyInteger('sort') -> notNull() -> default('0');//排序
            $table->tinyInteger('duration');
            $table->decimal('price',7,2);//价格，7表示七位，其中2表示两个小数
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profession');
    }
}
