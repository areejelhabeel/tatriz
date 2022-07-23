<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('time',45);
            $table->string('description',45);
            $table->date('date');
            $table->string('mobile',45);
            $table->string('size');
            $table->string('color');
            $table->foreignId('designer_id');
            $table->foreign('designer_id')->references('id')->on('designers');
            $table->foreignId('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreignId('design_id');
            $table->foreign('design_id')->references('id')->on('designs');
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
        Schema::dropIfExists('orders');
    }
}
