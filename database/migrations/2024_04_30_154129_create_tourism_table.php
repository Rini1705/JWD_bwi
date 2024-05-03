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
        Schema::create('tourism', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Name of the tourism destination or package
            $table->string('slug')->unique();  // Slug for the URL, unique
            $table->string('description');  // Description of the tourism destination or package
            $table->string('image');  // Image URL or path
            $table->bigInteger('accommodation');   
            $table->bigInteger('transportation');    
            $table->bigInteger('food');  
            $table->bigInteger('price');  // Price as decimal
            $table->time('open');  // Opening time
            $table->time('close');  // Closing time
            $table->timestamps();  // Automatic timestamp fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tourism');
    }
};
