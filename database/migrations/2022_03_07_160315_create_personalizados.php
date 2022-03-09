<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalizados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalizados', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('diseno_id')->unsigned();
            //Columnas para capas
            $table->string('piel');
            $table->string('pelo');
            $table->string('ojos');
            $table->string('nariz');
            $table->string('boca');
            $table->string('ropa');
            $table->string('accesorio');
            $table->timestamps();
            $table->foreign('diseno_id')->references('id')->on('disenos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personalizados');
    }
}
