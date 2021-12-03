<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresupuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->id('id');
            $table->string('nomPresupuesto')->nullable();
            $table->date('fechaPresupuesto')->nullable();
            $table->float('precioTotal', 8,2)->nullable();
            $table->string('observaciones', 250)->nullable();
            $table->string('pagado',2)->default('NO');
            $table->unsignedBigInteger('idBodaFK')->nullable(); //Para hacer las claves foráneas, uno a muchos
            $table->foreign('idBodaFK')
                    ->references('id')->on('bodas')
                    ->onDelete('set null');
            $table->unsignedBigInteger('idPackFK')->nullable(); //Para hacer las claves foráneas, uno a muchos
            $table->foreign('idPackFK')
                    ->references('id')->on('packs')
                    ->onDelete('set null');
            $table->unsignedBigInteger('idPromoFK')->nullable(); //Para hacer las claves foráneas, uno a muchos
            $table->foreign('idPromoFK')
                    ->references('id')->on('promocions')
                    ->onDelete('set null');
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
        Schema::dropIfExists('presupuestos');
    }
}
