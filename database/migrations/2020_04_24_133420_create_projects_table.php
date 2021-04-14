<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('projects', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name')->unique();
      $table->text('description');
      $table->string('picture')->nullable();
      $table->unsignedInteger('category_id');
      $table->date('date');
      $table->boolean('show_on_homepage')->default(0);
      $table->string('link');
      $table->string('github')->nullable();
      $table->string('youtube')->nullable();
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
    Schema::dropIfExists('projects');
  }
}
