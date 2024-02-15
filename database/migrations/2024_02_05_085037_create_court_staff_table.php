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
        Schema::create('court_staff', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('court_id');
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('staff_role_id');
            $table->foreign('person_id')->references('id')->on('persons');
            $table->foreign('staff_role_id')->references('id')->on('staff_role');

            $table->unique('court_id', 'person_id');

            $table->foreign('court_id')->references('id')->on('courts');
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
        Schema::dropIfExists('court_staff');
    }
};
