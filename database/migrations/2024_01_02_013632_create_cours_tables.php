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
        Schema::create('cours', function (Blueprint $table){
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->integer('niveau');
            $table->unsignedBigInteger('coach_id');
            $table->foreign('coach_id')->references('id')->on('users')->where('role','=','coach');
            $table->timestamps();
        });

        Schema::create('cours_rameur', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cours_id');
            $table->unsignedBigInteger('rameur_id');
            $table->foreign('cours_id')->references('id')->on('cours');
            $table->foreign('rameur_id')->references('id')->on('users')->where('role','=','participant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cours_rameur', function (Blueprint $table) {
            $table->dropForeign('cours_rameur_cours_id_foreign');
        });    
        Schema::dropIfExists('cours');
        Schema::dropIfExists('cours_rameur');
    }
};
