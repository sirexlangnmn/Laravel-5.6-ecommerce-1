<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            /* old
            $table->increments('cart_id');
            $table->integer('product_id');
            $table->string('product_name');
            $table->string('product_code');
            $table->string('product_color');
            $table->string('product_size');
            $table->float('product_price');
            $table->integer('product_quantity');
            $table->string('user_email');
            $table->string('session_id');
            $table->timestamps();
            $table->softDeletes();
            */

            $table->increments('cart_id');
            $table->integer('product_id');
            $table->integer('prod_attrib_id');
            $table->string('size');
            $table->integer('product_quantity');
            $table->string('user_email');
            $table->string('session_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
