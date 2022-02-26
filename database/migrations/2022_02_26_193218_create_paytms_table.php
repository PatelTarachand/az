<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaytmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paytms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('mobile');
            $table->string('email');
            $table->tinyInteger('status')->default(0);
            $table->integer('pay_amount');
            $table->string('order_id');
            $table->string('transaction_id')->default(0);
            $table->datetime('datetime');
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
        Schema::dropIfExists('paytms');
    }
}
