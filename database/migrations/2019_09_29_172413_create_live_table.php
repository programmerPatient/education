<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live', function (Blueprint $table) {
            $table->increments('id');
            $table->string('live_name',50)->notNull();
            $table->Integer('profession_id')->notNull();
            $table->Integer('stream_id')->notNull();
            $table->string('cover_img')->notNull();
            $table->Integer('sort')->notNull()->default(0);
            $table->string('description');
            $table->Integer('begin_at')->notNull();
            $table->Integer('end_at')->notNull();
            $table->Integer('video_addr');
            $table->timestamps();
            $table->enum('status',[1,2])->notNull()->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('live');
    }
}
