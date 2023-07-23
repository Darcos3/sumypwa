<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupons', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',200);
            $table->string('codigo',100);
            $table->unsignedDecimal('descuento_dinero', 10, 2)->default(0.0);
            $table->unsignedDecimal('descuento_porcentaje', 10, 2)->default(0.0);
            $table->integer('usos')->default(0);
            $table->date('vencimiento');
            $table->boolean('estado')->default(1);
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
        Schema::dropIfExists('cupons');
    }
}
