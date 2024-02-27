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
        Schema::create('statement_acceptance_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('last_statement_id');
            $table->smallInteger('accepted')->default(0);
            $table->string('comment')->nullable();
            $table->dateTime('date_time');
            $table->unsignedBigInteger('by');
            $table->foreign('last_statement_id')->references('id')->on('last_statement');
            $table->foreign('by')->references('id')->on('web_user');
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
        Schema::dropIfExists('statement_acceptance_detail');
    }
};
