<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePiggybanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piggybanks', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('Time');
            $table->string('amount_of_time');
            $table->foreignId('designer_id');
            $table->foreign('designer_id')->references('id')->on('designers');
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
        Schema::dropIfExists('piggybanks');
    }
}
