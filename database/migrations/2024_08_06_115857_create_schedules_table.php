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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')
                ->constrained('groups')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedTinyInteger('day_of_week'); // 1-7
            $table->time('start_time'); // 8:00
            $table->time('end_time');   // 13:10
            $table->string('subject');
            $table->string('teacher');
            $table->string('room'); // 1 - 55
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
