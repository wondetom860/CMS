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
        Schema::create('web_user', function (Blueprint $table) {
            $table->id();
            $table->string('user_name',100)->unique();
            $table->string('password',100);
            $table->string('email',150)->unique();
            $table->string('phone',20)->default('00000000');
            $table->unsignedBigInteger('person_id')->nullable()->unique();
            $table->foreign('person_id')->references('id')->on('persons');
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
        Schema::dropIfExists('web_user');
    }
};
