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
        Schema::create('users', function (Blueprint $table) {

            $table->string('nombre_usuario')->unique();
            $table->string('correo_electronico')->unique();

            //averiguar -$table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            //averiguar lo que es remember token
            $table->rememberToken();
            $table->timestamps();  //fecha de creacion y de modficiacion

            //crear los foreing key
            $table->unsignedBigInteger('id_rol'); //entero grande
            $table->foreign('id_rol')
               ->references('id_rol')
               ->on('rols')
               ->onDelete('Cascade')
               ->onUpdate('Cascade');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
