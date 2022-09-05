<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->integer('student_id');
            $table->string('class_id');
            $table->string('bill_no');
            $table->date('date');
            $table->string('doc')->nullable();
            $table->text('fees_note')->nullable();
            $table->string('fees_types_id');
            $table->bigInteger('amount');
            $table->integer('discount');
            $table->integer('paid');
            $table->string('paid_method');
            $table->string('created_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('fees');
    }
}
