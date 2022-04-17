<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_id');



            $table->string('type');

            $table->string('rate')->nullable();
            $table->string('note')->nullable();
            $table->string('status')->default('active');
            $table->string('payment_status')->default('notpaid');


            $table->integer('advance')->default(0);
            $table->integer('payable');
            $table->integer('paid')->default(0);

            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('via_id');

            $table->index('via_id');
            $table->index('company_id');


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
