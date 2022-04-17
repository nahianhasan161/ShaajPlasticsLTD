<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlasticProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plastic_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('meterial');
            $table->string('code');
            $table->string('quantity')->default(0);
            $table->string('weight');
            $table->string('stripes');
            $table->string('thickness');
            $table->string('packaging');
            $table->string('color');
            $table->string('price');
            $table->string('image');
            $table->integer('active')->default(0);

            $table->integer('category_id');
            $table->index('category_id');
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
        Schema::dropIfExists('plastic_products');
    }
}
