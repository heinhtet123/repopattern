<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_project', function (Blueprint $table) {
            $table->integer('student_id')->unsigned()->index();
            $table->foreign('student_id')->references('id')->on("students")->onDelete('cascade');

            $table->integer('project_id')->unsigned()->index();
            $table->foreign('project_id')->references('id')->on("project_groups")->onDelete('cascade');

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
        Schema::drop('student_project');
    }
}
