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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 45);
            $table->string('lastname', 45);
            $table->string('tel', 45);
            $table->string('email', 45);
            $table->unsignedBigInteger('companies_id');

            /*$table->foreign('companies_id')->references('id')->on('companies')
                ->onDelete('no action')
                ->onUpdate('no action');*/

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
