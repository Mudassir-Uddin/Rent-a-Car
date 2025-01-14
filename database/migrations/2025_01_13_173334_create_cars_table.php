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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brand');
            $table->unsignedBigInteger('model_id');
            $table->foreign('model_id')->references('id')->on('model');
            $table->string('img');
            $table->date('date');
            $table->string('registration_number')->unique();
            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')->references('id')->on('color');
            $table->unsignedBigInteger('transmission_id');
            $table->foreign('transmission_id')->references('id')->on('transmission__type');
            $table->integer('daily_rate');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
