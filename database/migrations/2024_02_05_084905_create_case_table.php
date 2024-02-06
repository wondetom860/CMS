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
            $table->unsignedBigInteger('case_number');
            $table->string('cause_of_action');
            $table->unsignedBigInteger('court_id');
            $table->string('case_status');
            $table->unsignedBigInteger('case_type_id');
            $table->foreign('court_id')->references('id')->on('court')->onDelete('cascade');
            $table->foreign('case_type_id')->references('id')->on('case_type')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
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
