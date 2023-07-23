<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFerreterosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ferreteros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nombre_ferreteria');
            $table->string('nit');
            $table->string('direccion');
            $table->string('numero_contacto');
            $table->string('email');
            $table->string('nombre_representante');
            $table->string('celular');
            $table->string('camara_comercio')->nullable();
            $table->string('foto_cedula')->nullable();
            $table->string('foto_rut')->nullable();
            $table->unsignedDecimal('cupo', 10, 2)->nullable();
            $table->unsignedDecimal('cupo_parcial', 10, 2)->nullable();
            $table->unsignedTinyInteger('estado_ferretero_id')->default(1);
            $table->text('motivo_revision')->nullable();
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
        Schema::dropIfExists('ferreteros');
    }
}
