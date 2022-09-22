<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagoRubroCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago_rubro_creditos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('valor',19,2);
            $table->foreignId('rubros_creditos_id')->constrained('rubros_creditos');
            $table->foreignId('cajero_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pago_rubro_creditos');
    }
}
