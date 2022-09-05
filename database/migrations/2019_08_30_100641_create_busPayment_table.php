<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatebuspaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

    
        Schema::create('bus_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bill_no');
            $table->string('month');
            $table->integer('academic_year_id');
            $table->string('bus_name');
            $table->string('bus_type_id');
            $table->string('amount');
            $table->integer('fees');
            $table->string('fees_note')->nullable();
            $table->string('reg_no');
            $table->integer('student_id');
            $table->string('paid');
            $table->string('doc');
            $table->string('_token');
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
        Schema::dropIfExists('bus_payments');
    }

}
