<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDropedCoursesCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('droped_courses_courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('droped_course_id')->unsigned();
            $table->foreign('droped_course_id')->references('id')->on('droped_courses');
            $table->bigInteger('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses');
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
        Schema::dropIfExists('droped_courses_courses');
    }
}
