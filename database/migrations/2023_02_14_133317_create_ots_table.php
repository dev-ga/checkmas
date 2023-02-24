<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ots', function (Blueprint $table) {
            $table->id();
            /**
             * @param $otUid
             * Formula: $fechaInicio(mdY) + $equipoUid + $tipoMantenimiento('mc' o 'mp')
             */
            $table->string('otUid');
            $table->string('fechaInicio');
            $table->string('tecRespondable');
            $table->string('equipoUid');
            $table->string('tipoMantenimiento');
            $table->string('owner');
            /**
             * @param $statusOts
             * Status de las Ots.
             * 1 - creada
             * 2 - aprobada
             * 3 - en ejecución
             * 4 - revision
             * 5 - cerrada
             */
            $table->string('statusOts')->default(1);
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
        Schema::dropIfExists('ots');
    }
};
