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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('job_id');
            $table->date('from');
            $table->date('to');
            $table->tinyInteger('accepted')->default(false);
            $table->tinyInteger('closed')->default(false);
            $table->unsignedBigInteger('ppp_id')->nullable();
            $table->string('hodnotenie', 25)->nullable();
            $table->integer('hodiny_odpracovane')->default(0);
            $table->tinyInteger('hodiny_accepted')->default(false);
            $table->timestamps();
            $table->softDeletes();
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
