<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnunciTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annunci', function (Blueprint $table) {
            $table->id();
            $table->string('stato');
            $table->string('titolo');
            $table->decimal('prezzo',10,2);
            $table->bigInteger('chilometraggio');
            $table->date('immatricolazione');
            $table->bigInteger('potenza');
            $table->string('cilindrata');
            $table->string('colore');
            $table->string('alimentazione');
            $table->string('carrozzeria');
            $table->text('descrizione');
            $table->string('indirizzo');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('modello_id');
            $table->unsignedBigInteger('comune_id');
            $table->string('immagine');
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
        Schema::dropIfExists('annunci');
    }
}
