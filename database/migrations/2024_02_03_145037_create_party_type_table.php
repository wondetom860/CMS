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
        Schema::create('party_type', function (Blueprint $table) {
            $table->id();
            $table->string('party_type_name')->unique;
            $table->text('description')->nullable;
            // $table->sta
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
        Schema::dropIfExists('party_type');
    }
};

///yoniiiiiiiiiiiiiiiiiiiiiiiiiiiiii