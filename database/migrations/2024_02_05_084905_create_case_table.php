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
        Schema::create('case', function (Blueprint $table) {
            $table->id();

            $table->string('case_number')->unique;
            $table->string('cause_of_action');
            $table->unsignedBigInteger('court_id');
            $table->smallInteger('case_status');
            $table->unsignedBigInteger('case_type_id');
            $table->foreign('court_id')->references('id')->on('courts')->onDelete('cascade');
            $table->foreign('case_type_id')->references('id')->on('case_type')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date')->nullable;
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
        Schema::dropIfExists('case');
    }
};
