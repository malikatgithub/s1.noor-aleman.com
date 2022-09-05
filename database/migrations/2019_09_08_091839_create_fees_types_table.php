<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('academic_years_id');
            $table->string('name');
            $table->string('class_id')->nullable();
            $table->string('fees_class')->unique();
            $table->bigInteger('amount');
            $table->date('date');
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
        Schema::dropIfExists('fees_types');
    }
}
