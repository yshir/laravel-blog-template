<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Carbon\Carbon;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned()->nullable();
            $table->string('title');
            $table->string('slug')->unique()->index('index_slug');
            $table->mediumText('body');
            $table->string('thumbnail')->nullable();
            $table->string('status')->default('draft');
            $table->string('meta_description')->nullable();
            $table->string('head_html')->nullable();
            $table->string('footer_html')->nullable();
            $table->string('canonical')->nullable();
            $table->dateTime('published_at')->default(Carbon::now());
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('posts');
    }
}
