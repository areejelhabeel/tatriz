<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('name',45);
            $table->string('description',45);
            $table->string('location',45);
            $table->string('mobile',15)->unique();
            $table->foreignId('designer_id');
            $table->foreign('designer_id')->references('id')->on('designers');
            $table->foreignId('designer_assistant_id');
            $table->foreign('designer_assistant_id')->references('id')->on('designer_assistants');
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
        Schema::dropIfExists('shops');
    }
}
