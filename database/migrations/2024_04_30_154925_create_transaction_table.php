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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('name')->nullable(); 
            $table->string('jk')->nullable();
            $table->string('nik')->nullable();
            $table->string('standar')->nullable();
            $table->string('deluxe')->nullable(); 
            $table->string('family')->nullable(); 
            $table->string('start_date')->nullable();
            $table->string('duration_stay')->nullable();
            $table->bigInteger('total')->nullable();  

            $table->date('date')->nullable(); 
            $table->string('hp')->nullable();                      
            $table->integer('number_people')->nullable();  
            $table->integer('number_day')->nullable();       
            $table->bigInteger('accommodation')->nullable();     
            $table->bigInteger('transportation')->nullable();      
            $table->bigInteger('food')->nullable();                
            $table->bigInteger('travel_package_price')->nullable();     
            $table->timestamps();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
