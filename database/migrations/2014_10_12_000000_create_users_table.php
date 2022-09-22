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
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('numero_cuenta');
            $table->string('nombres')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('cedula')->nullable();
            $table->string('provincia')->nullable();
            $table->string('canton')->nullable();
            $table->string('parroquia')->nullable();
            $table->string('recinto')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->string('lugar_nacimiento')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->enum('estado_civil',['Soltero','Casado','Divorciado','Viuido','Unión libre'])->nullable();
            $table->string('nombre_conyuge')->nullable();
            $table->string('cedula_conyuge')->nullable();
            $table->string('celular_conyuge')->nullable();
            $table->string('foto')->nullable();
            $table->boolean('estado')->default(false);
            $table->enum('sexo',['Hombre','Mujer'])->nullable();
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
