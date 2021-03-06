<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('room_label');
            $table->string('dimensions');
            $table->bigInteger('campus_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
        });

          
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('classrooms_campus_id_foreign');
        $table->dropIndex('classrooms_campus_id_index');
        $table->dropColumn('campus_id');
        Schema::dropIfExists('classrooms');
    }
}
