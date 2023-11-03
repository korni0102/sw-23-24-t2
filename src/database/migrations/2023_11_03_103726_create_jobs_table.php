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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('companies_id');
            $table->unsignedBigInteger('contracts_id');
            $table->string('description', 100);
            //added later
            /*$table->foreign('companies_id')->references('id')->on('companies')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->foreign('contracts_id')->references('id')->on('contracts')
                ->onDelete('no action')
                ->onUpdate('no action');*/

            // If you want to keep track of when jobs are created or updated:
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
