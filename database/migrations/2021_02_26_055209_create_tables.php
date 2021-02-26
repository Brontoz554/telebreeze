<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job', function (Blueprint $table) {
            $table->id('job_id');
            $table->string('job_name', 70);
        });

        Schema::create('user', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('first_name', 50);
            $table->string('middle_name', 50);
            $table->string('last_name', 50);
            $table->string('birthday', 20);
            $table->string('job_string')->nullable();
            $table->unsignedBigInteger('job_id')->nullable();

            $table->foreign('job_id')->references('job_id')->on('job');
        });


        Schema::create('education', function (Blueprint $table) {
            $table->id('education_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('facility', 100);
            $table->string('profession', 100);

            $table->foreign('user_id')->references('user_id')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job');
        Schema::dropIfExists('user');
        Schema::dropIfExists('education');
    }
}
