<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('authority_name');
            $table->string('title');
            $table->string('facebook_page');
            $table->string('youtube_channel');
            $table->string('address');
            $table->integer('phone_number');
            $table->string('email_address');
            $table->string('logo');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
