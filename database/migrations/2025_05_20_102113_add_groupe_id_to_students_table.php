<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGroupeIdToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->unsignedBigInteger('groupe_id')->nullable()->after('class_id');

            // Ajoute une contrainte de clé étrangère pour assurer l'intégrité
            $table->foreign('groupe_id')->references('id')->on('groupes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            // Supprime d'abord la contrainte, puis la colonne
            $table->dropForeign(['groupe_id']);
            $table->dropColumn('groupe_id');
        });
    }
}
