<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRubrosCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rubros_creditos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('numero_pago');
            $table->date('fecha_pago');
            $table->decimal('monto_pago',19,2);
            $table->decimal('interes_total',19,2);
            $table->decimal('pago_total',19,2);
            $table->decimal('saldo_capital',19,2);
            $table->enum('estado',['POR CANCELAR','CANCELADO','VENCIDO'])->default('POR CANCELAR');
            $table->foreignId('credito_id')->constrained('creditos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rubros_creditos');
    }
}
