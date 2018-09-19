<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTendersTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('tenders', function (Blueprint $table) {
      $table->increments('id');
      $table->string('title');
      $table->unsignedInteger('category_id')->nullable();
      $table->unsignedInteger('user_id')->nullable();
      $table->string('published_on');
      $table->string('closed_on');
      $table->integer('document_price');
      $table->integer('security_amount');
      $table->integer('status');
      $table->integer('image');
      $table->timestamps();

      $table->foreign('category_id')->references('id')->on('categories');
      $table->foreign('user_id')->references('id')->on('users');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('tenders');
  }
}
