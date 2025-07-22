<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNiveauIdToStudentsTeachers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->foreignId('niveau_id')->nullable()->constrained('niveaux')->onDelete('cascade');
        });
    
        Schema::table('teachers', function (Blueprint $table) {
            $table->foreignId('niveau_id')->nullable()->constrained('niveaux')->onDelete('cascade');
        });
    
        
    }
    
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['niveau_id']);
            $table->dropColumn('niveau_id');
        });
    
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropForeign(['niveau_id']);
            $table->dropColumn('niveau_id');
        });
    
       
    }
    
}
