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
            $table->integer('department_id')->unsigned();
            $table->integer('batch_id')->unsigned();
            $table->timestamps();
            
        });

        Schema::table('sections', function ( $table) {
            //$table->foreign('department_id')->references('id')->on('departments');
             
            //$table->foreign('batch_id')->references('id')->on('batches');
            
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
