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
        Schema::create('document', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_id');
            $table->unsignedBigInteger('csa_id');
            $table->unsignedBigInteger('document_type_id');
            $table->date('end_filed');
            $table->string('description');
            $table->string('doc_storage_path');
            $table->foreign('case_id')->references('id')->on('case')->onDelete('cascade');
            $table->foreign('csa_id')->references('id')->on('case_staff_assigning')->onDelete('cascade');
            $table->foreign('document_type_id')->references('id')->on('document_type')->onDelete('cascade');
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
        Schema::dropIfExists('document');
    }
};
