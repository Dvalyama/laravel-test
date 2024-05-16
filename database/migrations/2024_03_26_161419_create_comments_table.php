<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCommentsTable
 */
class CreateCommentsTable extends Migration
{

    /** @return void */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('post_id');
            $table->integer('parent_id')->nullable(); //разрешаем null;
            $table->text('text');
            $table->timestamps();
        });
    }

    /** @return void */
    public function down()
    {
        Schema::dropIfExists('comments');
    }

}
