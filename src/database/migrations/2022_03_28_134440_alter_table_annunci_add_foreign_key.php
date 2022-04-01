<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableAnnunciAddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('annunci', function (Blueprint $table) {
            $table->foreign('comune_id')->references('id')->on('comuni')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('modello_id')->references('id')->on('modelli')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('annunci', function (Blueprint $table) {
            $table->dropForeign('annunci_comune_id_foreign');
            $table->dropForeign('annunci_modello_id_foreign');
            $table->dropForeign('annunci_user_id_foreign');
        });
    }
}
