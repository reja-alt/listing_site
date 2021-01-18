<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialPagesTable extends Migration
{
    
    public function up()
    {
        Schema::create('social_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->text('facebook_page');
            $table->integer('facebook_status');
            $table->text('youtube_page');
            $table->integer('youtube_status');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('social_pages');
    }
}
