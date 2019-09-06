<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('pages', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name')->unique();
      $table->string('url')->unique();
      $table->enum('status', ['Enabled', 'Disabled'])->default('Disabled');
      $table->text('content');
      $table->string('meta_description')->nullable();
      $table->string('meta_title')->nullable();
      $table->string('meta_keywords')->nullable();
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
    Schema::dropIfExists('pages');
  }
}
