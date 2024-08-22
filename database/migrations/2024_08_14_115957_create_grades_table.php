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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')
                ->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('teacher_id')
                ->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('subject_id')
                ->constrained('subjects')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->unsignedSmallInteger('day');
            $table->unsignedSmallInteger('month');
            $table->unsignedSmallInteger('year');
            $table->unsignedSmallInteger('grade');

            $table->timestamps();

            $table->unique(['student_id', 'day', 'month', 'year']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
