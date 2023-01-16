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
        Schema::create('student_synopsis_theses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('thesis_synopsis_type')->nullable();
            $table->string('program')->nullable();
            $table->string('thesis_title')->nullable();
            $table->string('area_of_specialization')->nullable();
            $table->string('supervisor')->nullable();
            $table->string('synopsis_file')->nullable();
            $table->string('thesis_document')->nullable();
            $table->string('synopsis_approval_notification')->nullable();
            $table->string('session')->nullable();
            $table->date('defence_date')->nullable();
            $table->integer('submission_status')->nullable();
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
        Schema::dropIfExists('student_synopsis_theses');
    }
};
