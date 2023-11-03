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
            $table->string('password', 45);
            $table->string('tel', 45)->nullable();
            $table->unsignedBigInteger('roles_id');
            $table->unsignedBigInteger('feedback_id');
            $table->date('year');

            //added later
            /*$table->foreign('roles_id')->references('id')->on('roles')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->foreign('feedback_id')->references('id')->on('feedbacks')
                ->onDelete('no action')
                ->onUpdate('no action');*/

            $table->engine = 'InnoDB';
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
