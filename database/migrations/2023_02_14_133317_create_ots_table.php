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
            $table->string('tecRes_NomApe');
            $table->string('tecRes_email');
            $table->string('equipoUid');
            $table->string('tipoMantenimiento');
            $table->decimal('costo_oper', 18, 2)->nullable()->default(0.00);
            $table->decimal('costo_preCli', 18, 2)->nullable()->default(0.00);
            $table->string('pdf_pre_oper');
            $table->string('pdf_pre_preCli');
            $table->string('owner');
            /**
             * @param $statusOts
             * Status de las Ots.
             * 1 - creada
             * 2 - aprobada
             * 3 - ejecución
             * 4 - supervision
             * 5 - finalizada
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
