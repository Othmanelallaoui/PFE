<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
{
    Schema::create('employes_formations', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('employe_id');
        $table->foreign('employe_id')->references('id')->on('employees')->onDelete('cascade');
        $table->unsignedBigInteger('session_formation_id');
        $table->foreign('session_formation_id')->references('id')->on('sessions_formations')->onDelete('cascade');
        // Autres colonnes selon vos besoins
        $table->timestamps();
    });
}






    public function down(): void
    {
        Schema::dropIfExists('employes_formations');
    }
};
