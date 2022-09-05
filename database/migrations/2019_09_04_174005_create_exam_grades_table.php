<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_grades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('academic_years_id');
            $table->integer('std_id');
            $table->integer('class_id');
            $table->integer('exam_id');
            $table->integer('subject_id');
            $table->integer('grade');
            $table->integer('total_grade');
            $table->softDeletes(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_grades');
    }
}
