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
            $table->bigInteger('user_id')->unsigned();
            $table->string('talla')->nullable();
            $table->string('color')->nullable();
            $table->decimal('precio');
            $table->string('tamano')->nullable();
            $table->timestamps();
            $table->foreign('diseno_id')->references('id')->on('disenos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
