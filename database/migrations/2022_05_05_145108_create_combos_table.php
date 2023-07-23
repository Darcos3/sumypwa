<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCombosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 200);
            $table->string('slug', 200)->nullable();
            $table->string('sku', 200);
            $table->foreignId('categoria_id');
            $table->text('descripcion_corta');
            $table->text('descripcion')->nullable();
            $table->text('especificaciones')->nullable();
            $table->unsignedDecimal('precio', 10, 2);
            $table->unsignedDecimal('precio_descuento', 10, 2)->nullable();
            $table->unsignedDecimal('precio_ferretero', 10, 2)->nullable();
            $table->unsignedSmallInteger('vendidos')->nullable();
            $table->boolean('activo')->default(1);
            $table->string('imagen', 100)->nullable()->default('sin-imagen.png');
            $table->unsignedDecimal('valoracion', 2, 1)->nullable();
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
        Schema::dropIfExists('combos');
    }
}
