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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('question')->default('0')->nullable();
            $table->string('a')->default('0')->nullable();
            $table->string('b')->default('0')->nullable();
            $table->string('c')->default('0')->nullable();
            $table->string('d')->default('0')->nullable();
            $table->string('ans')->default('0')->nullable();
            $table->integer('status')->default(1);

            $table->unsignedBigInteger('instructor_id')->unsigned(); 
            $table->unsignedBigInteger('course_id')->unsigned(); 
            $table->unsignedBigInteger('section_id')->unsigned();
            $table->unsignedBigInteger('lecture_id')->unsigned(); 
            $table->foreign('instructor_id')
                                ->references('id')->on('users')
                                ->onDelete('cascade');
            $table->foreign('course_id')
                                ->references('id')->on('courses')   
                                ->onDelete('cascade');    
            $table->foreign('section_id')
                                ->references('id')->on('course_sections')   
                                ->onDelete('cascade');   
            $table->foreign('lecture_id')
                                ->references('id')->on('course_lectures')
                                ->onDelete('cascade');
                                           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
