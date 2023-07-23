<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncarritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encarritos', function (Blueprint $table) {
            $table->id();
            $table->integer('carrito_id');
            $table->integer('encarrito_id');
            $table->string('encarrito_type', 200);
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
        Schema::dropIfExists('encarritos');
    }
}
