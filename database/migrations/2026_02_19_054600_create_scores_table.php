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
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->foreignId('course_id');
            $table->foreignId('term_id');
            $table->decimal('test_1', 5, 2)->default(0);
            $table->decimal('test_2', 5, 2)->default(0);
            $table->decimal('exam', 5, 2)->default(0);
            $table->decimal('total', 5, 2)->default(0);
            $table->string('grade')->nullable();
            $table->integer('position_in_course')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
