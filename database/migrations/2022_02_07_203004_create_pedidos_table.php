<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->integer('numero')->nullable();
            $table->string('wompi_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedTinyInteger('estado_pedido_id')->default(1);
            $table->unsignedDecimal('cupon_descuento', 15, 2)->nullable();
            $table->unsignedBigInteger('cupon_id')->nullable();
            $table->unsignedDecimal('total', 15, 2);
            $table->unsignedDecimal('envio', 15, 2)->nullable();
            $table->unsignedTinyInteger('medio_transporte_id')->nullable();
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('nombre_empresa')->nullable();
            $table->string('numero_identificacion')->nullable();
            $table->string('direccion')->nullable();
            $table->string('direccion_adicional')->nullable();
            $table->unsignedMediumInteger('ciudad_id')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->text('comentario')->nullable();
            $table->string('nombre_envio')->nullable();
            $table->string('apellido_envio')->nullable();
            $table->string('nombre_empresa_envio')->nullable();
            $table->string('numero_identificacion_envio')->nullable();
            $table->string('direccion_envio')->nullable();
            $table->string('direccion_adicional_envio')->nullable();
            $table->unsignedMediumInteger('ciudad_envio_id')->nullable();
            $table->string('email_envio')->nullable();
            $table->string('telefono_envio')->nullable();
            $table->integer('id_transportador');
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
        Schema::dropIfExists('pedidos');
    }
}
