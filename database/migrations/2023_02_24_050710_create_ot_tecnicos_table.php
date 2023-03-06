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
        Schema::create('ot_tecnicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ot_id')->constrained('ots')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('otUid_id')->constrained('ots')->onUpdate('cascade')->onDelete('cascade');
            $table->string('fechaEjecucion');
            $table->string('tipoMantenimiento');
            $table->string('limConden');
            $table->string('limEva');
            $table->string('lecAmpComp');
            $table->string('lecPreAlta');
            $table->string('lecPreBaja');
            $table->string('observacionesMp');
            $table->string('listaMateriales');
            $table->string('fotoMpAntes1');
            $table->string('fotoMpAntes2');
            $table->string('fotoMpDesp1');
            $table->string('fotoMpDesp2');
            $table->string('fotoMcAntes1');
            $table->string('fotoMcAntes2');
            $table->string('fotoMcDesp1');
            $table->string('fotoMcDesp2');
           
            $table->string('observacionesMc');
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
        Schema::dropIfExists('ot_tecnicos');
    }
};
