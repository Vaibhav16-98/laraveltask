<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullble();
            $table->string('class')->nullble();
            $table->date('admission_date')->nullble();
            $table->integer('yearly_fees')->nullble();
            $table->unsignedBigInteger('class_teacher_id');
            $table->foreign('class_teacher_id')->references('id')->on('tearchers')->onDelete('cascade');
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
};
