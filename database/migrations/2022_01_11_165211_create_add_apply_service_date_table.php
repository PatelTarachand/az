<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddApplyServiceDateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apply_services', function (Blueprint $table) {
                    $table->date('apply_date')->nullable();
                    $table->time('apply_time')->nullable();
                    $table->date('assign_date')->nullable();
                    $table->time('assign_time')->nullable();
                    $table->date('complete_service_date')->nullable();
                    $table->time('complete_service_time')->nullable();
                    $table->date('cancel_service_date')->nullable();
                    $table->time('cancel_service_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('add_apply_service_date');
    }
}
