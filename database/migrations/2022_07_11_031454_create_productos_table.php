<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id_producto');
            $table->string('nombre', 50)->required();
            $table->string('talla', 10)->required();
            $table->longText('observaciones')->required();
            $table->unsignedBigInteger('id_marca')->required();
            $table->foreign('id_marca')->references('id_marca')->on('marcas');
            $table->integer('cantidadInventario')->required();
            $table->date('fechaEmbarque')->required();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
