<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */

  public function up()
  {
    Schema::create('dog_date', function (Blueprint $table) {
      $table->id();
      $table->integer('dog_id');
      $table->string('age');
      $table->string('image');
      $table->integer('weight');
      $table->integer('coeffcient');
      $table->integer('calorie');
      $table->integer('food');
      $table->timestamps();

      // $table->foreign('dog_id')->references('id')->on('users_dogs');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('dog_date');
  }
};
