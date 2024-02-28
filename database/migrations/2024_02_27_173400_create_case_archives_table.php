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
        Schema::create('case_archives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id')->nullable();
            $table->unsignedBigInteger('case_id');
            $table->enum('file_type', ['audio','vedio','doc'])->nullable();
            $table->string('file_path')->nullable();
            $table->dateTime('date_archived');
            $table->mediumText('description');
            $table->unsignedBigInteger('archived_by');
            $table->string('remark')->nullable();
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('case_id')->references('id')->on('case');
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
        Schema::dropIfExists('case_archives');
    }
};
