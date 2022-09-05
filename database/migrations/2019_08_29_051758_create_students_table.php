<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('academic_years_id');
            $table->string('name');
            $table->date('dob');
            $table->string('gender');
            $table->string('relegion');
            $table->string('blood')->nullable();
            $table->string('nationality');
            $table->string('pic')->nullable();
            $table->string('std_note')->nullable();
            $table->string('fa_name');
            $table->string('ma_name');
            $table->bigInteger('fa_phone');
            $table->string('address');
            $table->string('reg_no')->nullable();
            $table->bigInteger('class_id')->nullable();
            $table->bigInteger('fees');
            $table->bigInteger('reg_fees');
            $table->bigInteger('bus_fees');
            $table->text('fees_note')->nullable();
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
        Schema::dropIfExists('students');
    }
}
