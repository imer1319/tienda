<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained('users');
            $table->foreignId('driver_id')->nullable()->constrained('drivers');
            $table->enum('status',['PENDIENTE','EN PROCESO','ACEPTADO','CANCELADO','COMPLETADO'])->default('PENDIENTE');
            $table->bigInteger('total');
            $table->enum('sale_type',['CONTADO','DEUDA'])->default('CONTADO');
            $table->bigInteger('pago_faltante')->default(0);
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
        Schema::dropIfExists('pedidos');
    }
}
