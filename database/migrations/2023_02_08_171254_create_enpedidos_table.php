<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnpedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enpedidos', function (Blueprint $table) {
            $table->id();
            $table->integer('pedido_id');
            $table->integer('enpedido_id');
            $table->string('enpedido_type', 200);
            $table->unsignedDecimal('precio', 10, 2);
            $table->unsignedSmallInteger('cantidad')->nullable();
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
        Schema::dropIfExists('enpedidos');
    }
}
