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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('login');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('password');
            $table->string('profile');
            $table->foreignId('group_id')->constrained()->onDelete('cascade');
            $table->string('year_of_study');
            $table->string('specialization');
            $table->unsignedInteger('tuition_paid');
            $table->enum('role', ['student', 'teacher', 'admin'])->default('student');
            $table->enum('theme', ['light', 'dark'])->default('light');
            $table->boolean('is_activated')->default(true);
            $table->boolean('is_health_check_complete')->default(false);
            $table->timestamps();
        });


        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
