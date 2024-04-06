<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
         

    public function up()
    {
        Schema::create('evaluations_formations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('session_formation_id');
            $table->foreign('session_formation_id')->references('id')->on('sessions_formations')->onDelete('cascade');
            $table->integer('note')->nullable();
            $table->text('commentaire')->nullable();
            // Autres colonnes selon vos besoins
            $table->timestamps();
        });
    }
    




    public function down(): void
    {
        Schema::dropIfExists('evaluations_formations');
    }
};
