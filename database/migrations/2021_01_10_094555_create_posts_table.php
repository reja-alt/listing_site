
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('subcategory_id')->unsigned();
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('division_id')->unsigned();
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->integer('subdistrict_id')->unsigned();
            $table->foreign('subdistrict_id')->references('id')->on('sub_districts')->onDelete('cascade');
            $table->integer('district_id')->unsigned();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->integer('ads_type');
            $table->string('description');
            $table->integer('zipcode');
            $table->string('brand');
            $table->string('model');
            $table->string('price');
            $table->integer('price_type');
            $table->string('city');
            $table->string('address');
            $table->string('name');
            $table->integer('phone_number');
            $table->integer('whatsapp');
            $table->string('email');
            $table->string('condition_type');
            $table->string('authenticaty');
            $table->string('feature');
            $table->text('feature_description');
            $table->string('main_thumbnail');
            $table->string('image');
            $table->date('published_date');
            $table->string('month');
            $table->integer('year');
            $table->integer('status');
            $table->integer('view');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
