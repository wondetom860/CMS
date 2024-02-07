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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_id');
            $table->unsignedBigInteger('event_type_id');
            $table->string('date_time');
            $table->string('location');
            $table->string('out_come');
            $table->foreign('case_id')->references('id')->on('case');
            $table->foreign('event_type_id')->references('id')->on('event_type');
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
        Schema::dropIfExists('events');
    }
};
