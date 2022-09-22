<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('numero')->comment('numero de credito');
            $table->foreignId('tipo_credito_id')->constrained('tipo_creditos');
            $table->decimal('monto_prestamo',19,2);
            $table->decimal('tasa_tae',10,2);
            $table->integer('plazo');
            $table->string('termino')->comment('m=meses,a=años');
            $table->date('dia_pago');
            $table->decimal('pago_mensual',19,2);
            $table->integer('numero_pagos');
            $table->decimal('total_pago',19,2);
            $table->decimal('total_interes',19,2);
            $table->date('fecha_apertura')->nullable();
            $table->enum('estado',['APERTURADO','ENTREGADO','CANCELADO','PRECANCELADO','ANULADO'])->default('APERTURADO');
            $table->foreignId('user_id')->comment('socio')->constrained('users');
            $table->foreignId('asesor_id')->comment('asesor de crédito')->constrained('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('creditos');
    }
}
