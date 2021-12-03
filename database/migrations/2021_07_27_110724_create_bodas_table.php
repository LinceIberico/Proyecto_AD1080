<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBodasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bodas', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('idUserFK')->nullable();
            $table->foreign('idUserFK')
                    ->references('id')
                    ->on('users')
                    ->onDelete('set null');
            $table->string('nomBoda')->nullable();
            $table->date('fechaBoda');
            $table->time('horaBoda')->nullable();
            $table->string('nomNovio')->nullable();
            $table->string('nomNovia')->nullable();
            $table->string('dirNovio')->nullable();
            $table->string('dirNovia')->nullable();
            $table->integer('tlfNovio')->nullable();
            $table->integer('tlfNovia')->nullable();
            $table->string('emailNovio')->nullable();
            $table->string('emailNovia')->nullable();
            $table->string('ceremonia')->nullable();
            $table->string('celebracion')->nullable();
            $table->string('descripcion')->nullable();
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
        Schema::dropIfExists('bodas');
    }
}
