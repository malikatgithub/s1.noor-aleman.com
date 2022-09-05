<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('academic_years_id');
            $table->string('name');
            $table->date('dob');
            $table->string('gender');
            $table->string('qualification');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('id_card');
            $table->integer('salary');
            $table->date('join_date');
            $table->string('pic');
            $table->string('address');
            $table->string('teacher_note')->nullable();
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
        Schema::dropIfExists('teachers');
    }
}


