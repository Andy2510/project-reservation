<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('orders', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->double('total_amount', 6,2);
          $table->double('tax_amount', 6,2);
          $table->timestamps();
          $table->foreign('user_id')->references('id')->on('users');
          });

      Schema::create('carts', function (Blueprint $table) {
          $table->increments('id');
          $table->string('token')->nullable();
          $table->integer('dish_id')->unsigned();
          $table->integer('order_id')->nullable()->unsigned();
          $table->timestamps();
          $table->foreign('dish_id')->references('id')->on('dishes')->onDelete('cascade');
          $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    //   Schema::table('cart', function (Blueprint $table){
    //     $table->dropForeign('order_id');
    //     $table->dropForeign('dish_id');
    // });
      Schema::dropIfExists('carts');
    //   Schema::table('orders', function (Blueprint $table){
    //     $table->dropForeign('user_id');
    // });
      Schema::dropIfExists('orders');
    }
}
