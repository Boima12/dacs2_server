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
        Schema::create('test1', function (Blueprint $table) {
            $table->increments('stt'); 
            $table->string('name', 255); 
            $table->text('hobby'); 
            $table->timestamps(); 
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test1');
    }
};