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
            $table->foreignId('detalle_pedido_id')->constrained('detalle_pedidos');
            $table->foreignId('cliente_id')->constrained('users');
            $table->enum('status',['EN PROCESO','ACEPTADO'])->default('EN PROCESO');
            $table->bigInteger('total');
            $table->enum('sale_type',['CONTADO','DEUDA'])->default('CONTADO');
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
