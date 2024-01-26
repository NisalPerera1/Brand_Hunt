<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('quantity');
            $table->string('image')->nullable();
            $table->json('gallery_images')->nullable(); // Change to JSON type for storing multiple images
            // $table->text('gallery_images')->nullable();

            $table->text('description')->nullable();
            $table->integer('price');
            $table->text('short_description')->nullable();
            $table->string('sku');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
