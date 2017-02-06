<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomtasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_tasks', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->string('roomname');
            $table->text('description');
            $table->boolean('status')->default(false);
            $table->timestamps();

            $table->foreign('user_id') // user id
            ->references('id') // ref id
            ->on('users')//on user table
            ->onDelete('cascade'); //on delete

        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_tasks');
    }
}
