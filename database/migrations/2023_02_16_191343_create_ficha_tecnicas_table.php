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
        Schema::create('ficha_tecnicas', function (Blueprint $table) {
            $table->id();
            $table->string('voltaje');
            $table->string('amp');
            $table->string('watts');
            $table->string('nFases');
            $table->string('btu');
            $table->string('refri');
            $table->string('cargaRefri');
            $table->string('mvMarca');
            $table->string('mvVoltaje');
            $table->string('mvCorriente');
            $table->string('compreMarca');
            $table->string('compreVoltaje');
            $table->string('compreCorriente');
            $table->string('munMarca');
            $table->string('munVoltaje');
            $table->string('munCorriente');
            $table->string('otrasCaTec');
            $table->string('observaciones');
            $table->string('funcionamiento');
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
        Schema::dropIfExists('ficha_tecnicas');
    }
};
