<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('last_statement', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_id');
            $table->text('statement_description');
            $table->string('judges', 50);
            $table->dateTime('date_time');
            $table->unsignedBigInteger('event_id')->nullable();
            $table->unsignedBigInteger('written_by');
            $table->smallInteger('accept_status')->default(0);
            $table->string('remark')->nullable();
            $table->foreign('case_id')->references('id')->on('case');
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('written_by')->references('id')->on('web_user');
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
        Schema::dropIfExists('last_statement');
    }
};
