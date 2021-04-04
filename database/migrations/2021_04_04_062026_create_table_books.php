<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
	    $table->string('title');
	    $table->integer('id_author');
	    $table->boolean('saga')->default(false);
	    $table->string('name_saga')->nullable();
	    $table->string('synopsis',9999);
	    $table->integer('sheets')->nullable();
	    $table->date('date')->nullable();
	    $table->string('languages')->nullable();
	    $table->integer('reads');
	    $table->string('image');
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
        Schema::dropIfExists('books');
    }
}
