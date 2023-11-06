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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 45);
            $table->string('lastname', 45);
            $table->string('email', 45)->unique();
            $table->string('password', 255);
            $table->string('tel', 45)->nullable();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('study_program_id')->nullable();
            $table->integer('year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
