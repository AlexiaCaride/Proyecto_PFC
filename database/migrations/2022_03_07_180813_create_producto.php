<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('camiseta_id')->unsigned();
            $table->bigInteger('taza_id')->unsigned();
            $table->bigInteger('print_id')->unsigned();
            $table->string('imagen');
            $table->integer('stock');
            $table->decimal('precio');
            $table->timestamps();
            $table->foreign('camiseta_id')->references('id')->on('camiseta')->onDelete('cascade');
            $table->foreign('taza_id')->references('id')->on('taza')->onDelete('cascade');
            $table->foreign('print_id')->references('id')->on('print')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
}
