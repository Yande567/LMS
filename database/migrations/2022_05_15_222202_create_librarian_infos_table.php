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
        if(!Schema::hasTable('librarian_infos')) {
            Schema::create('librarian_infos', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->string('first_name');
                $table->string('last_name');
                $table->string('gender', 10);
                $table->string('contact', 10);
                $table->timestamps();

                //foreign key constraints
                $table->foreign('user_id')->references('id')->on('users')
                    ->onUpdate('cascade')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('librarian_infos');
    }
};
