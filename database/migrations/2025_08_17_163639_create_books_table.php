<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('country_id');
            $table->json('name');
            $table->json('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->date('published_date')->nullable();
            $table->integer('pages')->nullable();
            $table->string('isbn')->nullable(); 
            $table->string('basic_image_path')->nullable();
            $table->string('language')->nullable(); 
            $table->string('format')->nullable(); 
            $table->string('weight')->nullable();
            $table->string('tags')->nullable();
            $table->string('publish_year')->nullable();
            $table->integer('avl_qty')->nullable();
            $table->integer('sales_count')->default(0);
            $table->timestamps();
    
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
