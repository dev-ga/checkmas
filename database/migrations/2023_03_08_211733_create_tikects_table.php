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
        Schema::create('tikects', function (Blueprint $table) {
            $table->id();
            $table->string('tipoServicio');
            $table->string('oficina');
            $table->string('piso');
            $table->string('estado');
            $table->string('agencia');
            $table->string('observaciones');
            $table->string('owner');
            $table->string('owner_email');
            $table->string('status_tikect');
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
        Schema::dropIfExists('tikects');
    }
};
