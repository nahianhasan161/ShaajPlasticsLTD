<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('website_images', function (Blueprint $table) {
            $table->id();
            $table->text('landing_one');
            $table->text('landing_two');
            $table->text('landing_three');

            $table->text('certificate_one');
            $table->text('certificate_two');
            $table->text('certificate_three');

            $table->text('office_one');
            $table->text('office_two');

            $table->text('about');
            $table->text('distribution');
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
        Schema::dropIfExists('website_images');
    }
}
