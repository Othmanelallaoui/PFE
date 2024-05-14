<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatuToDemandCongeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('demand_conge', function (Blueprint $table) {
            $table->enum('statu', ['refuser', 'en attente', 'approuvée'])->default('en attente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('demand_conge', function (Blueprint $table) {
            $table->dropColumn('statu');
        });
    }
}
