<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteContactDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {






        Schema::create('website_contact_details', function (Blueprint $table) {
            $table->id();
            $table->text('email');

            $table->text('office_one_phone');
            $table->text('office_two_phone');

            $table->text('office_one_address');
            $table->text('office_two_address');


            $table->text('facebook');
            $table->text('whatsapp');
            $table->text('twitter');
            $table->text('youtube');
            $table->text('youtube_video');
            $table->text('map');

            $table->text('propiter');
            $table->text('landing_title_one');
            $table->text('landing_title_two');
            $table->text('landing_title_three');

            $table->text( 'aboutUs');

            $table->text('distribution_title');
            $table->text('distribution_description');


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
        Schema::dropIfExists('website_contact_details');
    }
}
