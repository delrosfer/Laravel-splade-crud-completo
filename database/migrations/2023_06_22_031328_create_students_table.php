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
        Schema::create('students', function (Blueprint $table) {
            $table->id()->startingValue(5000);
            $table->foreignId('class_id')->constrained('classes');
            $table->foreignId('section_id')->constrained();
            $table->string('name');
            $table->string('email');
            $table->string('avatar')->nullable();
            $table->string('phone_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
