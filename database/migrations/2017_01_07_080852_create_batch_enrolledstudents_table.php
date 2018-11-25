<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchEnrolledstudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('batch_enrolledstudents', function (Blueprint $table) {
            $table->integer('enrolledstudents_id')->unsigned()->nullable();
            $table->integer('batch_id')->unsigned()->nullable();
            $table->integer('student_bill');
            $table->boolean("numbers_of_payment");
            $table->boolean("status");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
