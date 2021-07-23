<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_cabanas');
            $table->text('nombre');
            $table->text('apellido');
            $table->text('correo');
            $table->float('pago_reserva');
            $table->text('codigo_reserva');
            $table->text('descripcion_reserva');
            $table->date('fecha_ingreso');
            $table->date('fecha_salida');
            $table->timestamp('fecha_reserva');

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
        Schema::dropIfExists('reservas');
    }
}
