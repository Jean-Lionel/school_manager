<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('trimestre');
            $table->string('travail_numero');
            $table->float('point_obtenu');
            $table->float('ponderation');
            $table->foreignId('student_id');
            $table->foreignId('course_id');
            $table->foreignId('classe_id');
            $table->foreignId('anne_scolaire_id');
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(array('travail_numero', 'student_id','trimestre','ponderation','course_id','classe_id','anne_scolaire_id'),'check_note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
