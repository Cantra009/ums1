<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('receipt');
            $table->string('type');
            $table->string('bank_receip')->nullable();
            $table->string('payment_method')->nullable();;
            $table->decimal('credit', 15, 2)->nullable();
            $table->decimal('debit', 15, 2)->nullable();
            $table->decimal('additional', 15, 2)->nullable();
            $table->decimal('discount', 15, 2)->nullable();
            $table->decimal('deduction', 15, 2)->nullable();
            $table->decimal('refund', 15, 2)->nullable();
            $table->decimal('balance', 15, 2)->nullable();
            $table->string('remark', 30)->nullable();
            $table->timestamps();
            $table->bigInteger('user_id')->unsigned();
             $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');
            $table->bigInteger('semester_id')->unsigned();
            $table->foreign('semester_id')->references('id')->on('semesters');
           



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
