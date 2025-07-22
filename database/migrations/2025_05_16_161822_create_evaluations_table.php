<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->unsignedBigInteger('groupe_id')->nullable();
            $table->string('matiere');
            $table->string('type');
            $table->integer('bareme');
            $table->date('date');
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('evaluations');
    }
}
