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
            $table->string('ot_id');
            $table->string('fechaRegistro');
            $table->string('descripcion');
            $table->string('agencia');
            $table->string('estado');
            $table->string('owner');
            $table->string('estatusPr');
            $table->string('estatusAd');
            $table->string('estatusGs');
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
