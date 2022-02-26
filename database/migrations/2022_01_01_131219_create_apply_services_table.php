<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_services', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->string('description')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('manual_address')->nullable();
            $table->integer('service_man_id')->nullable();
            $table->integer('status')->default(0)->comment('0:apply Service,1:Assign Task, 2: Process services,3:Compate Task,4:Cancel Service,5: uncompleted Service ,6 :payment done');
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
        Schema::dropIfExists('apply_services');
    }
}
