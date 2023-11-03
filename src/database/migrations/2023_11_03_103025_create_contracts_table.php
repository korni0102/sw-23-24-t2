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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id'); // Use unsignedBigInteger for foreign keys.
            $table->date('from');
            $table->date('to');
            $table->tinyInteger('accepted')->nullable();
            $table->tinyInteger('closed')->nullable();

            $table->timestamps(); // Optional: if you want to track created and updated times
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
