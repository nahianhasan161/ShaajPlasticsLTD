<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();

            $table->string('tracking_id');
            $table->string('delivery_by_name');
            $table->string('delivery_by_phone');
            $table->string('delivery_by_address');

            $table->string('delivery_to_name');
            $table->string('delivery_to_phone');
            $table->string('delivery_to_address');

            /* $table->integer('payable');
            $table->integer('paid')->default(0); */

            $table->string('status')->default('pending');


            $table->longText('note')->nullable();



            $table->unsignedBigInteger('order_id');
            $table->index('order_id');
            $table->softDeletes();
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
        Schema::dropIfExists('deliveries');
    }
}
