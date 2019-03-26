<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('department_name');
            $table->string('department_code');
            $table->integer('faculty_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->timestamps();
            
            
        });
        Schema::table('departments', function ($table) {
           // $table->foreign('faculty_id')->references('id')->on('faculties');
           // $table->foreign('user_id')->references('id')->on('users');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('departments_faculty_id_foreign');
        $table->dropIndex('departments_faculty_id_index');
        $table->dropColumn('faculty_id');
        Schema::dropIfExists('departments');
    }
}

