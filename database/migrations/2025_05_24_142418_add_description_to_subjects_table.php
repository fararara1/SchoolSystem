<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionToSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('subjects', function (Blueprint $table) {
        $table->text('description')->nullable();
    });
}

public function down()
{
    Schema::table('subjects', function (Blueprint $table) {
        $table->dropColumn('description');
    });
}

}
