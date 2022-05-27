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
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ISBN_number', 13)->unique();
            $table->string('book_title');
            $table->string('author_fname', 25);
            $table->string('author_lname', 25);
            $table->string('edition', 25);
            // "number_of_copies" refers to the total number of copies that were registered in the lib
            $table->integer('number_of_copies');
            $table->date('publish_date');
            $table->string('publisher');
            $table->integer('created_by')->unsigned();
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('created_by')->references('id')->on('users')
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
        Schema::dropIfExists('books');
    }
};
