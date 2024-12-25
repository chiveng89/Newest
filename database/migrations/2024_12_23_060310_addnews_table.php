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
        Schema::create('addnews', function (Blueprint $table) {
            $table->id('addnews_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('short_description');
            $table->boolean('add_to_slide')->default(false);
            $table->boolean('add_to_home')->default(false);
            $table->boolean('add_to_related_views')->default(false);
            $table->boolean('add_to_most_views')->default(false);
            $table->longText('long_description');
            $table->enum('image_position', ['left', 'right'])->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('addnews');
    }
};
