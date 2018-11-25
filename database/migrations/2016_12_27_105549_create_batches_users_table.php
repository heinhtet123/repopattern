<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('batches_users', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('batch_id')->unsigned()->nullable();
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
