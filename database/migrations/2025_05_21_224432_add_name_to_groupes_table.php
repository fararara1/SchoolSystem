<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameToGroupesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('groupes', function (Blueprint $table) {
        $table->string('name')->after('teacher_id');
    });
}

public function down()
{
    Schema::table('groupes', function (Blueprint $table) {
        $table->dropColumn('name');
    });
}

}
