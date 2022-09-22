<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_creditos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('segmento');
            $table->decimal('tasa_referencial',19,2);
            $table->decimal('tasa_maxima',19,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_creditos');
    }
}
