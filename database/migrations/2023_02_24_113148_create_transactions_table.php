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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_customers');
            $table->string('customer_name');
            $table->string('product_name');
            $table->bigInteger('total_product');
            $table->string('total_pay');
            $table->text('address');
            $table->boolean('payment_status')->default(false);
            $table->timestamp('date');

            $table->foreign('id_customers')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
