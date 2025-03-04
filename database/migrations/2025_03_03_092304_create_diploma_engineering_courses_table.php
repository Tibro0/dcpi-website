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
        Schema::create('diploma_engineering_courses', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name')->unique();
            $table->string('slug');
            $table->string('month');
            $table->string('duration');
            $table->string('course_fee');
            $table->string('short_description');
            $table->text('long_description');
            $table->integer('priority_number');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diploma_engineering_courses');
    }
};
