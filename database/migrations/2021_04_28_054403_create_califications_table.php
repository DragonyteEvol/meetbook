<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('califications', function (Blueprint $table) {
            $table->id();
	    $table->integer('book_id')->unique();
	    $table->integer('score');
	    $table->integer('reviews');
	    $table->integer('five_star')->default(0);
	    $table->integer('four_star')->default(0);
	    $table->integer('three_star')->default(0);
	    $table->integer('two_star')->default(0);
	    $table->integer('one_star')->default(0);
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
        Schema::dropIfExists('califications');
    }
}
