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
        // Modify users table
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('roles_id')->references('id')->on('roles')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->foreign('feedback_id')->references('id')->on('feedbacks')
                ->onDelete('no action')
                ->onUpdate('no action');
        });

        Schema::table('feedbacks', function (Blueprint $table) {
            $table->foreign('contracts_id')->references('id')->on('contracts')
                ->onDelete('no action')
                ->onUpdate('no action');
        });

        Schema::table('jobs', function (Blueprint $table) {
            $table->foreign('companies_id')->references('id')->on('companies')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->foreign('contracts_id')->references('id')->on('contracts')
                ->onDelete('no action')
                ->onUpdate('no action');
        });

        Schema::table('study_programs', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('companies_id')->references('id')->on('companies')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // When rolling back, drop the foreign keys first
            $table->dropForeign(['roles_id']);
            $table->dropForeign(['feedback_id']);
        });

        // Then drop the users table
        Schema::dropIfExists('users');

        Schema::table('feedbacks', function (Blueprint $table) {
            // When rolling back, drop the foreign keys first
            $table->dropForeign(['contracts_id']);
        });

        // Then drop the users table
        Schema::dropIfExists('feedbacks');

        Schema::table('jobs', function (Blueprint $table) {
            // When rolling back, drop the foreign keys first
            $table->dropForeign(['companies_id']);
            $table->dropForeign(['contracts_id']);
        });

        // Then drop the users table
        Schema::dropIfExists('jobs');

        Schema::table('study_programs', function (Blueprint $table) {
            // When rolling back, drop the foreign keys first
            $table->dropForeign(['users_id']);
        });

        // Then drop the users table
        Schema::dropIfExists('study_programs');

        Schema::table('contacts', function (Blueprint $table) {
            // When rolling back, drop the foreign keys first
            $table->dropForeign(['companies_id']);
        });

        // Then drop the users table
        Schema::dropIfExists('contacts');

    }
};
