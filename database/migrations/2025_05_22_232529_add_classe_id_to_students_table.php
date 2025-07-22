<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClasseIdToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('students', function (Blueprint $table) {
        $table->unsignedBigInteger('classe_id')->nullable()->after('id');
        $table->foreign('classe_id')->references('id')->on('classes')->onDelete('set null');
    });
}

public function down()
{
    Schema::table('students', function (Blueprint $table) {
        $table->dropForeign(['classe_id']);
        $table->dropColumn('classe_id');
    });
}

}
