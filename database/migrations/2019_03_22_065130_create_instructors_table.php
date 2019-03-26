<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->string('email');
            $table->string('gender');
            $table->string('qualification');
            $table->string('title');
            $table->integer('phone');
            $table->string('type');
            
            
            $table->timestamps();
        });

        Schema::table('instructors', function ($table) {
            //$table->foreign('department_id')->references('id')->on('departments');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('instructors_department_id_foreign');
        $table->dropIndex('instructors_department_id_index');
        $table->dropColumn('department_id');
        Schema::dropIfExists('instructors');
    }
}
