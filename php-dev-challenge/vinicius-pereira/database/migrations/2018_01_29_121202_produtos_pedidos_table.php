<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProdutosPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_pedido', function (Blueprint $table) {
            
            $table->integer('id_produto')->unsigned();
            $table->integer('id_pedido')->unsigned();
            $table->primary(['id_produto','id_pedido']);
        });

        Schema::table('produto_pedido', function (Blueprint $table) {
            $table->foreign('id_pedido')
                    ->references('id')->on('pedidos');
            $table->foreign('id_produto')
                    ->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_pedido');
    }
}
