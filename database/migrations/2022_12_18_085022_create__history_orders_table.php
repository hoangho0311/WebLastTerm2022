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
        Schema::create('HistoryOrders', function (Blueprint $table) {
            $table->id();
            $table->string("iduser");
            $table->string("idproduct");
            $table->string("Amount");
            $table->string("TimeOrder");
            $table->string("OrderStatus");

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
        Schema::dropIfExists('HistoryOrders');
    }
};
