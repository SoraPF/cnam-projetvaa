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
        Schema::create('equipe', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('equipe_rameur', function (Blueprint $table) {
            $table->id();
            $table->foreign('equipe_id')->references('id')->on('equipe');
            $table->foreign('rameur_id')->references('id')->on('users')->where('role','=','rameur');
            $table->timestamps();
        });

        Schema::create('equipe_coach', function (Blueprint $table) {
            $table->id();
            $table->foreign('equipe_id')->references('id')->on('equipe');
            $table->foreign('coach_id')->references('id')->on('users')->where('role','=','coach');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipe');
        Schema::dropIfExists('equipe_rameur');
        Schema::dropIfExists('equipe_coach');
    }
};
