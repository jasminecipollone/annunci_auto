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
            $table->bigInteger('user_id');
            $table->bigInteger('modello_id');
            $table->bigInteger('comune_id');
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
