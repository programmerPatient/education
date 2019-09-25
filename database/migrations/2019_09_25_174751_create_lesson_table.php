<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lesson_name',50)->notNull();
            $table->Integer('course_id')->notNull();
            $table->Integer('video_time')->notNull();
            $table->string('video_addr');//视频地址
            $table->Integer('sort')->notNull()->default(0);
            $table->string('description');
            $table->timestamps();
            $table->enum('status',[1,2])->notNull()->default('2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson');
    }
}
