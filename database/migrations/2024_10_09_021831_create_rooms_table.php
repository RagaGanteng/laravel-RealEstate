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
    Schema::create('rooms', function (Blueprint $table) {
        $table->id();
        $table->foreignId('categoryId')->nullable()->constrained('categories')->onDelete('cascade');
        $table->foreignId('userId')->nullable()->constrained('users')->onDelete('cascade');
        $table->string('name');
        $table->text('description')->nullable();
        $table->text('image')->nullable();
        $table->integer('capacity');
        $table->integer('price')->nullable();
        $table->enum('status', ['approved', 'draft', 'closed'])->default('draft');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};