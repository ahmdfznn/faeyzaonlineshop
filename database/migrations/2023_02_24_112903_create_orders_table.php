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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->string('customers');
            $table->unsignedBigInteger('id_product');
            $table->string('product_name');
            $table->string('variant')->nullable();
            $table->string('price');
            $table->bigInteger('qty');
            $table->string('total_price');
            $table->boolean('confirmed')->default(false);
            $table->string('payment_method');
            $table->timestamp('order_date');

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_product')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
