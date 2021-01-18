<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
   
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('title')->unique();
            $table->text('details');
            $table->string('page_link')->unique();
            $table->string('slug')->unique();
            $table->integer('type');
            $table->string('image');
            $table->string('page_color');
            $table->string('page_title_color');
            $table->integer('customize');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
