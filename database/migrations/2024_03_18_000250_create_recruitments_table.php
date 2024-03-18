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
        Schema::create('recruitments', function (Blueprint $table) {
            $table->id();
            $table->string('titre_poste');
            $table->text('description_poste');
            $table->date('date_publication');
            $table->date('date_cloture');
            $table->string('type_contrat');
            $table->decimal('salaire_propose', 10, 2)->nullable();
            $table->text('formation_requise');
            $table->string('experience_requise');
            $table->text('langues_requises');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruitments');
    }
};
