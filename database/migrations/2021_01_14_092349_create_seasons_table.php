<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasons', function (Blueprint $table) {

            // $table->bigInteger('id')->unsigned()->autoIncrement();
            // $table->unsignedBigInteger('id')->autoIncrement();
            $table->id();

            $table->smallInteger('season_number');
            $table->date('release_date')->nullable();


            //$table->unsignedBigInteger('serie_id');
            //$table->foreign('serie_id')->references('id')->on('series');
            
            $table->foreignId('serie_id')->constrained();



            //datetime x2
            //created_at
            //updated_at
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
        Schema::dropIfExists('seasons');
    }
}
