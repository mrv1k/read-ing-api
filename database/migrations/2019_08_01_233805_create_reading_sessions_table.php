<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadingSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reading_sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('start');
            $table->unsignedInteger('end');
            $table->unsignedBigInteger('book_id');
            $table->foreign('book_id')->references('id')->on('books');
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
        Schema::dropIfExists('reading_sessions');
    }
}
