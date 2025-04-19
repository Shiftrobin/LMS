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
        Schema::create('quiz_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned();             
            $table->string('result');
            $table->integer('instructor_id');
            $table->integer('course_id');
            $table->integer('section_id');
            $table->integer('lecture_id');
            $table->integer('status')->default(1);
            $table->foreign('user_id')
                                ->references('id')->on('users')
                                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_results');
    }
};
