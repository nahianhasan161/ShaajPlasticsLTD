<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRowMaterialQuantityHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('row_material_quantity_histories', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->integer('quantity');
            $table->integer('price');
            $table->dateTime('date');

            $table->string('type')->default('Added');
            $table->integer('oldQuantity')->nullable();
            $table->integer('oldPrice')->nullable();

            $table->unsignedBigInteger('row_metarial_id');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('row_material_quantity_histories');
    }
}
