<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('transection_id');
            $table->string('note')->nullable();
            $table->string('type');
            $table->string('status')->default('notpaid');
            $table->integer('total');
            $table->integer('due');
            $table->integer('paid')->default(0);
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('client_id');
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
        Schema::dropIfExists('bills');
    }
}
