<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('student_id', 10)->unique();
            $table->string('first_name', 25);
            $table->string('last_name', 25);
            $table->string('gender', 10);
            $table->string('school', 50);
            $table->string('contact', 10)->unique();
            $table->timestamps();

             // Foreign key constraints
             $table->foreign('user_id')->references('id')->on('users')
             ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
