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
            $table->string('price');
            $table->string('quantity');
            $table->string('type');

            $table->string('rate')->nullable();
            $table->string('note')->nullable();

            $table->string('product_id');
            $table->string('company_id');
            $table->string('via_id');

            $table->index('via_id');
            $table->index('company_id');
            $table->index('product_id');

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
        Schema::dropIfExists('orders');
    }
}
