<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('director', 50);
            $table->decimal('budget',8,2);
            $table->integer('duration');
            $table->integer('year');
            $table->decimal('rating',5,1);
            $table->tinyInteger('genre')->unsigned();
            $table->string('poster_url');
            $table->string('cast');
            $table->mediumText('plot');
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
        Schema::dropIfExists('movies');
    }
}
