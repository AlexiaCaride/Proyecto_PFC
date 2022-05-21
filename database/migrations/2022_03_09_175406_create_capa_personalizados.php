<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapaPersonalizados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capa_personalizados', function (Blueprint $table) {
            $table->bigInteger('capa_id')->unsigned();
            $table->bigInteger('personalizados_id')->unsigned();
            $table->timestamps();
            $table->foreign('capa_id')->references('id')->on('capas')->onDelete('cascade');
            $table->foreign('personalizados_id')->references('id')->on('personalizados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capa_personalizados');
    }
}
