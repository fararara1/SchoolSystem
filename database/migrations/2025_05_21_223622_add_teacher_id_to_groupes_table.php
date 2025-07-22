<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTeacherIdToGroupesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('groupes', function (Blueprint $table) {
            $table->unsignedBigInteger('teacher_id')->nullable()->after('id');
    
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::table('groupes', function (Blueprint $table) {
            $table->dropForeign(['teacher_id']);
            $table->dropColumn('teacher_id');
        });
    }
}
