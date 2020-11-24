<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id',11);
            $table->unsignedBigInteger('user_id');
            $table->string('order_code',10);
            $table->datetime('order_date');
            $table->unsignedBigInteger('ship_address_id');
            $table->decimal('ship_ammount',10,2);
            $table->unsignedBigInteger('payment_method_id');
            $table->unsignedBigInteger('delivery_status_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('ship_address_id')->references('id')->on('addresses')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('delivery_status_id')->references('id')->on('delivery_statuses')->onUpdate('RESTRICT')->onDelete('CASCADE');
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
        Schema::dropIfExists('oders');
    }
}
