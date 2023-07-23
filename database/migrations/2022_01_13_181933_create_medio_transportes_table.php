<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedioTransportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medio_transportes', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('nombre', 200);
            $table->unsignedDecimal('ancho', 10, 2)->nullable();
            $table->unsignedDecimal('alto', 10, 2)->nullable();
            $table->unsignedDecimal('largo', 10, 2)->nullable();
            $table->unsignedDecimal('peso', 10, 2)->nullable();
            $table->unsignedDecimal('precio', 10, 2)->nullable();
            $table->boolean('activo')->default(1);
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
        Schema::dropIfExists('medio_transportes');
    }
}
