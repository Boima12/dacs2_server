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
        Schema::create('sessiontest', function (Blueprint $table) {
            $table->increments('stt'); 
            $table->string('nickname', 255); // Default max length is 255; no need to specify
            $table->integer('age');         // Correct usage of `integer`
            $table->bigInteger('point');    // Use `bigInteger` for larger numbers
            $table->timestamps();           // Created_at and updated_at timestamps
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessiontest');
    }
};
