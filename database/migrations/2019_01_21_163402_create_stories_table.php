<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoriesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('stories', function (Blueprint $table) {
      $table->increments('id');
      $table->string('title')->unique();
      $table->string('slug')->unique();
      $table->text('excerpt')->nullable();
      $table->longText('article')->nullable();
      $table->string('picture')->nullable();
      $table->unsignedInteger('category_id');
      $table->string('status');
      $table->date('published_date')->nullable();
      $table->timestamps();

      $table->foreign('category_id')->references('id')->on('categories');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('stories');
  }
}
