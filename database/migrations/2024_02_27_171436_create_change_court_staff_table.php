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
        Schema::create('change_court_staff', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('csa_id');
            $table->longText('termination_reason')->comment('reason for terminating case assignment');
            $table->dateTime('requestd_at')->comment('Date and time of request for terminating');
            $table->unsignedBigInteger('requested_by');
            $table->dateTime('requested_at');
            $table->smallInteger('request_accepted')->default(0);
            $table->dateTime('request_accepted_at')->nullable();
            $table->smallInteger('approval_status')->default(0);
            $table->dateTime('approved_at')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->string('remark')->nullable();
            $table->foreign('csa_id')->references('id')->on('case_staff_assignment');
            $table->foreign('requested_by')->references('id')->on('web_user');
            $table->foreign('approved_by')->references('id')->on('web_user');
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
        Schema::dropIfExists('change_court_staff');
    }
};
