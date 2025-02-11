<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
         Schema::create('advertisement', function (Blueprint $table){
                $table->id();
                $table->string('size');
                $table->unsignedBigInteger('category_id');
                $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
                $table->enum('status', ['enabled', 'disabled'])->default('enabled');
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
        Schema::dropIfExists('advertisement');
    }
};
