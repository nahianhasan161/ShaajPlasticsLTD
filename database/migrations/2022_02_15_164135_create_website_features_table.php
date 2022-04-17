<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_features', function (Blueprint $table) {
            $table->id();
            $table->text('title_one');
            $table->text('title_two');
            $table->text('title_three');
            $table->text('description_one');
            $table->text('description_two');
            $table->text('description_three');

            $table->unsignedBigInteger('details_id');
            $table->index('details_id');
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
        Schema::dropIfExists('website_features');
    }
}
