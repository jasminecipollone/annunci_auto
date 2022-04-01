<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDettagliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dettagli', function (Blueprint $table) {
            $table->id();
            $table->integer('proprietari')->nullable();
            $table->string('cambio');
            $table->string('vernice')->nullable();
            $table->string('rivestimenti')->nullable();
            $table->integer('posti');
            $table->integer('porte');
            $table->string('consumi')->nullable();
            $table->string('emissioni')->nullable();
            $table->string('equipaggiamento')->nullable();
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
        Schema::dropIfExists('dettagli');
    }
}
