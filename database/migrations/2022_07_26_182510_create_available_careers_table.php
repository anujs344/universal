<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailableCareersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('available_careers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('experience');
            $table->string('location');
            $table->integer('vacancy');
            $table->date('lastedate');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('career_categories')->onDelete('cascade');
            $table->text('roles');
            $table->text('requirement');
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
        Schema::dropIfExists('available_careers');
    }
}
