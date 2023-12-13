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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('contract_id')->nullable();
            $table->tinyInteger('vystupovanie')->unsigned();
            $table->tinyInteger('jednanie_s_klientom')->unsigned();
            $table->tinyInteger('samostatnost_prace')->unsigned();
            $table->tinyInteger('tvorivy_pristup')->unsigned();
            $table->tinyInteger('dochvilnost')->unsigned();
            $table->tinyInteger('dodrzovanie_etickych_zasad')->unsigned();
            $table->tinyInteger('motivacia')->unsigned();
            $table->tinyInteger('doslednost_pri_plneni_povinnosti')->unsigned();
            $table->tinyInteger('ochota_sa_ucit')->unsigned();
            $table->tinyInteger('schopnost_spolupracovat')->unsigned();
            $table->tinyInteger('vyuzitie_pracovnej_doby')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
