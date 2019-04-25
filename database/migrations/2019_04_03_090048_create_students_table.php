<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_no');
            $table->string('full_name');
            $table->date('dob');
            $table->string('gender');
            $table->integer('phone');
            $table->string('parent_name');
            $table->integer('parent_phone');
            $table->string('photo');
            $table->bigInteger('department_id')->unsigned();
            $table->string('shift');
            $table->bigInteger('section_id')->unsigned();
            $table->bigInteger('batch_id')->unsigned();
            $table->enum('scholarship', ['yes', 'no'])->default('no');
            $table->enum('status', ['1', '0'])->default('1');
            $table->timestamps();
            $table->bigInteger('user_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
