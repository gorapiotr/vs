<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('worker_id')->nullable()->unsigned()->index();
            $table->foreign('worker_id')->references('id')->on('workers')->onDelete('cascade');
            $table->integer('shelter_id')->nullable()->unsigned()->index();
            $table->foreign('shelter_id')->references('id')->on('shelters')->onDelete('cascade');
            $table->text('name');
            $table->enum('color', ['niebieski', 'szary', 'czerwony', 'brązowy', 'czarno-szary', 'rudy']);
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
        Schema::dropIfExists('cats');
    }
}
