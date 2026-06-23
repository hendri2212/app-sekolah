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
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('competition_name');
            $table->string('organizer')->nullable();
            $table->enum('level', ['kota', 'kabupaten', 'provinsi', 'nasional', 'internasional']);
            $table->string('rank')->nullable();
            $table->string('medal_icon', 10)->default('🏆');
            $table->string('recipient_name');
            $table->enum('recipient_type', ['siswa', 'tim', 'sekolah'])->default('siswa');
            $table->date('achieved_at')->nullable();
            $table->string('certificate_number')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->unsignedSmallInteger('order_number')->default(1);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['is_active', 'achieved_at']);
            $table->index(['level', 'achieved_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
