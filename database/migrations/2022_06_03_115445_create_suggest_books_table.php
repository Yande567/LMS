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
        Schema::create('suggest_books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('isbn', 13);
            $table->string('category', 50);
            $table->integer('suggested_by')->unsigned();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('suggested_by')->references('id')->on('users')
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
        Schema::dropIfExists('suggest_books');
    }
};
