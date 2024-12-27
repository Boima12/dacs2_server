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
        Schema::create('works', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('jobTitle'); // Position title
            $table->text('jobDescription'); // Role responsibilities and expectations
            $table->string('workType'); // Remote, hybrid, or in-office
            $table->string('location')->nullable(); // City and country, nullable
            $table->string('qualifications'); // Required qualifications
            $table->text('experiences'); // Years of experience or specific skills
            $table->text('requireSkills'); // Programming languages or tools
            $table->string('jobSalary')->nullable(); // Salary range or estimate
            $table->text('jobBenefits')->nullable(); // Benefits like health insurance, bonuses, etc.
            $table->text('jobInstruction'); // Application instructions
            $table->date('jobDeadline'); // Deadline for applications
            $table->string('jobCompanyName'); // Hiring organization name
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('works');
    }
};
