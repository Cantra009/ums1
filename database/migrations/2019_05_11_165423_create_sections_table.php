<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('section_name');
            $table->string('shift');
            $table->bigInteger('classroom_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->integer('batch_id')->unsigned();
            $table->integer('user_id')->unsigned();
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
        $table->dropForeign('sections_department_id_foreign');
        $table->dropIndex('sections_department_id_index');
        $table->dropColumn('department_id');

        $table->dropForeign('sections_batch_id_foreign');
        $table->dropIndex('sections_batch_id_index');
        $table->dropColumn('batch_id');

        Schema::dropIfExists('sections');
    }
}
