<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('online_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grade_id')->constrained('grades')->cascadeOnDelete();
            $table->foreignId('classroom_id')->constrained('classrooms')->cascadeOnDelete();
            $table->foreignId('section_id')->constrained('sections')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('meeting_id');
            $table->string('topic');
            $table->integer('duration')->comment('minutes');
            $table->string('password')->comment('meeting password');
            $table->dateTime('start_at');
            $table->text('start_url');
            $table->text('join_url');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('online_classes');
    }
};
