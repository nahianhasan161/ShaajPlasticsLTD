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


            $table->integer('company_id');
            $table->integer('via_id');

            $table->index('via_id');
            $table->index('company_id');
           /*  $table->integer('max_number')->default(1); */


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
