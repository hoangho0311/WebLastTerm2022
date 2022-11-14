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
        Schema::create('infors', function (Blueprint $table) {
            $table->id();
            $table->string('iduser');
            $table->string('fname')->default('fname');
            $table->string('lname')->default('lname');
            $table->string('address')->default('address');
            $table->string('city')->default('city');
            $table->string('country')->default('country');
            $table->string('description')->default('description');
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
        Schema::dropIfExists('infors');
    }
};
