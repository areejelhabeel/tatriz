<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignerAssistantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designer_assistants', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',45);
            $table->string('last_name',45);
            $table->string('user_name',45)->unique();
            $table->string('email',45)->unique();
            $table->string('mobile',15)->unique();
            $table->string('facebook_link',45);
            $table->string('instagram_link',45);
            $table->string('password');
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
        Schema::dropIfExists('designer_assistants');
    }
}
