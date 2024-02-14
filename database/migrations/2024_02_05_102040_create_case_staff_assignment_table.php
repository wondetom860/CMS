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
        Schema::create('case_staff_assignment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_id');
            $table->unsignedBigInteger('court_staff_id');
            $table->string('assigned_as');
            $table->string('assigned_at');
            $table->unsignedBigInteger('assigned_by');
            $table->foreign('case_id')->references('id')->on('case');
            $table->foreign('court_staff_id')->references('id')->on('court_staff');
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
        Schema::dropIfExists('case_staff_assignment');
    }
};
