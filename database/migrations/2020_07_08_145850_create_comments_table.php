<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // $table->increments('id');
            $table->string('user_id');
            $table->string('email');
            $table->longText('content');
            $table->integer('rate');
            // $table->integer('commentable_id');
            // $table->string('commentable_type');
            $table->bigInteger('course_id')->unsigned()->nullable();
            $table->foreign('course_id')
                ->references('id')
                ->on('course');
            $table->string('slug')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
