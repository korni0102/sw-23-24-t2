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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->text('text')->nullable(false); // Use text instead of varchar to match VARCHAR(300)
            $table->unsignedBigInteger('contracts_id');

            //added later
            /*$table->foreign('contracts_id')->references('id')->on('contracts')
                ->onDelete('no action')
                ->onUpdate('no action');*/

            // Add timestamps if you wish to track when feedbacks are created or updated
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
