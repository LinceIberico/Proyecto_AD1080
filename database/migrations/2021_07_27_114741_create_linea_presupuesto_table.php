<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineaPresupuestoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linea_presupuesto', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('idPresupuestoFK'); //Para hacer clave foranea mucho a mucho
            $table->foreign('idPresupuestoFK')
                    ->references('id')->on('presupuestos')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('idExtraFK');
            $table->foreign('idExtraFK')
                    ->references('id')->on('extras')
                    ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('linea_presupuesto');
    }
}
