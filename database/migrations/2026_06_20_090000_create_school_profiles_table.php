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
        Schema::create('school_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('school_name')->nullable();
            $table->string('active_school_year')->nullable();
            $table->year('established_year')->nullable();
            $table->integer('teacher_count')->nullable();
            $table->integer('staff_count')->nullable();
            $table->integer('student_count')->nullable();
            $table->string('establishment_decree_number')->nullable();
            $table->string('establishment_decree_file')->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('accreditation')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_profiles');
    }
};
