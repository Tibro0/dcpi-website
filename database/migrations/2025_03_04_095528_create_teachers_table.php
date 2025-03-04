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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name')->unique();
            $table->string('slug');
            $table->string('designation');

            $table->string('email')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('facebook_id_name')->nullable();
            $table->string('facebook_url')->nullable();

            $table->string('linkedin_id_name')->nullable();
            $table->string('linkedin_url')->nullable();

            $table->string('twitter_id_name')->nullable();
            $table->string('twitter_url')->nullable();

            $table->string('website_url')->nullable();
            $table->string('address')->nullable();
            $table->string('address_url')->nullable();

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
        Schema::dropIfExists('teachers');
    }
};
