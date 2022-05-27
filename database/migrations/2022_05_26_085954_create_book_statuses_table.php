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
        Schema::create('book_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_id')->unsigned()->unique;
            $table->integer('number_of_availible_copies');
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('book_id')->references('id')->on('books')
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
        Schema::dropIfExists('book_statuses');
    }
};
