<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropSubjectIdFromNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notes', function (Blueprint $table) {
            // Vérifie que la contrainte existe avant de tenter de la supprimer
            if (Schema::hasColumn('notes', 'subject_id')) {
                $table->dropForeign(['subject_id']);
                $table->dropColumn('subject_id');
            }
        });
        
    }

    public function down()
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->unsignedBigInteger('subject_id')->nullable();

            // Remettre la contrainte étrangère si besoin (adapter le nom de la table et clé)
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        });
    }
}
