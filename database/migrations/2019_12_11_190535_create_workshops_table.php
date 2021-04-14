<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('workshops', function (Blueprint $table) {
      $table->increments('id');
      $table->string('title')->unique();
      $table->string('slug');
      $table->text('excerpt')->nullable();
      $table->longText('description')->nullable();
      $table->string('picture')->nullable();
      $table->unsignedInteger('venue_id');
      $table->string('status');
      $table->string('mode');
      $table->dateTime('start_date');
      $table->dateTime('end_date');
      $table->text('link')->nullable();
      $table->text('youtube')->nullable();
      $table->text('slide')->nullable();
      $table->text('photo')->nullable();
      $table->timestamps();

      $table->foreign('venue_id')->references('id')->on('venues');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('workshops');
  }
}
