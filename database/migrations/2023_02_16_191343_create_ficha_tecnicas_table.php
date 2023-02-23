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
            $table->string('uid');
            $table->string('qrConden');
            $table->string('tipoConden');
            $table->string('voltaje');
            $table->string('phases');
            $table->string('tipoRefri');
            $table->string('btu');
            $table->string('tipoCompresor');
            $table->string('marcaCompresor');
            $table->string('ampCompresor');
            $table->string('placaCompresor');
            $table->string('tipoVentilador');
            $table->string('etiqVentilador');
            $table->string('compreCorriente');
            $table->string('qrEvaporador');
            $table->string('fotoEvaporador');
            $table->string('oficina');
            $table->string('piso');
            $table->string('agencia');
            $table->string('estado');
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
