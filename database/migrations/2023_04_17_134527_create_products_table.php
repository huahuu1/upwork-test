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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->integer('price');
            $table->integer('cost')->nullable();
            $table->string('unit', 20)->nullable();
            $table->integer('weight')->nullable();
            $table->text('image_url')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('catalog_id')->constrained('catalogs');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
