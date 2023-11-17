<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pedido_id')->constrained('pedidos');
            $table->foreignId('conductor_id')->constrained('drivers');
            $table->foreignId('secretaria_id')->constrained('users');
            $table->enum('status',['EN PROCESO','PENDIENTE','COMPLETADO'])->default('EN PROCESO');
            $table->bigInteger('total');
            $table->bigInteger('cantidad_restante');
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
        Schema::dropIfExists('sales');
    }
}
