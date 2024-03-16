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
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('admin_id')->nullable();

            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('admin_id')->references('id')->on('users')->nullable();

            $table->date('start_date');
            $table->date('end_date');
            $table->string('absence_type');
            $table->float('duration');
            $table->string('reason');
            $table->text('comments')->nullable();
            $table->string('document_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
};
