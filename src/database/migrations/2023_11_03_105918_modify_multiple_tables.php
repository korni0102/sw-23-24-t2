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
            $table->foreign('role_id')->references('id')->on('roles')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->foreign('study_program_id')->references('id')->on('study_programs')
                ->onDelete('no action')
                ->onUpdate('no action');
        });

        Schema::table('feedbacks', function (Blueprint $table) {
            $table->foreign('contract_id')->references('id')->on('contracts')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
        });

        Schema::table('jobs', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->foreign('contact_id')->references('id')->on('contacts')
                ->onDelete('no action')
                ->onUpdate('no action');
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies')
                ->onDelete('no action')
                ->onUpdate('no action');
        });

        Schema::table('contracts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->foreign('job_id')->references('id')->on('jobs')
                ->onDelete('no action')
                ->onUpdate('no action');
        });

        Schema::table('role_requests', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->foreign('admin_id')->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
        });

        Schema::table('job_requests', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->foreign('job_id')->references('id')->on('jobs')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->foreign('ppp_id')->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
        });

        Schema::table('grades', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
            $table->foreign('contract_id')->references('id')->on('contracts')
                ->onDelete('no action')
                ->onUpdate('no action');

        });

    }
        /**
         * Reverse the migrations.
         */
        public
        function down(): void
        {
            Schema::table('users', function (Blueprint $table) {
                $table->dropForeign(['roles_id']);
                $table->dropForeign(['study_program_id']);
            });

            Schema::dropIfExists('users');

            Schema::table('feedbacks', function (Blueprint $table) {
                $table->dropForeign(['contract_id']);
                $table->dropForeign(['user_id']);
            });

            Schema::dropIfExists('feedbacks');

            Schema::table('jobs', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
                $table->dropForeign(['contact_id']);
            });

            Schema::dropIfExists('jobs');

            Schema::table('study_programs', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
            });

            Schema::dropIfExists('study_programs');

            Schema::table('contacts', function (Blueprint $table) {
                $table->dropForeign(['company_id']);
            });

            Schema::dropIfExists('contacts');

            Schema::table('contracts', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->dropForeign(['job_id']);
            });

            Schema::dropIfExists('contracts');

            Schema::table('role_requests', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->dropForeign(['role_id']);
                $table->dropForeign(['admin_id']);
            });

            Schema::dropIfExists('role_requests');

            Schema::table('job_requests', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->dropForeign(['job_id']);
                $table->dropForeign(['ppp_id']);
            });
            Schema::dropIfExists('job_requests');

            Schema::table('grades', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->dropForeign(['contract_id']);
            });
            Schema::dropIfExists('grades');

        }
    };
