<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->unique();
            $table->unsignedTinyInteger('rol_id')->default(2);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('estado')->default(1);
            $table->string('cedula');
            $table->date('birthday');
            $table->integer('id_ciudad');
            $table->string('direccion');
            $table->string('identificador');
            $table->string('forma_pago');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
