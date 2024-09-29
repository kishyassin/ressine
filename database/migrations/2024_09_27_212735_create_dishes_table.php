<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->decimal('price');
            $table->string('imageSlide')->nullable();
            $table->string('imageHero')->nullable();
            $table->string('imageIcon')->nullable();
            $table->decimal('average_rating')->default(0);
            $table->boolean('featured')->default(false); // is the dish is featured to be displayed in home page
            $table->foreignId('category_id')->constrained('categories');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plats');
    }
};
