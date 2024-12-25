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
        Schema::create('accounts', function (Blueprint $table) {
            // Account Credentials
            $table->increments('stt');
            $table->string('accountName', 255)->unique(); // Unique username
            $table->text('accountPassword'); // Secure password

            // Personal Information
            $table->string('fullName', 255)->nullable(); // Real name
            $table->string('accountPicture', 255)->nullable(); // Optional profile picture
            $table->text('accountAbout')->nullable(); // Short bio

            // Professional Information
            $table->text('accountSkills')->nullable(); // Skills (comma-separated, JSON, etc.)
            $table->string('accountCurrentJob', 255)->nullable(); // Current job
            $table->string('accountEducation', 255)->nullable(); // Degrees/certifications
            $table->text('accountDesiredRoles')->nullable(); // Desired positions
            $table->text('accountPreferedLocation')->nullable(); // Geographic preferences
            $table->string('accountSalary', 50)->nullable(); // Expected salary range

            // Connection
            $table->string('accountPhone', 20)->nullable(); // Optional phone number
            $table->string('accountEmail', 255)->unique(); // Email for communication
            $table->text('accountAddress')->nullable(); // Optional address
            $table->string('accountLink_portfolio', 255)->nullable(); // Portfolio link
            $table->string('accountLink_linkedin', 255)->nullable(); // LinkedIn link
            $table->string('accountLink_twitter', 255)->nullable(); // Twitter link
            $table->string('accountLink_github', 255)->nullable(); // GitHub link
            $table->string('accountLink_facebook', 255)->nullable(); // Facebook link

            // Timestamps
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
