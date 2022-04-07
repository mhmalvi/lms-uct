<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('uid')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('address_line_1')->nullable();
            $table->string('admin_area_2')->nullable();
            $table->string('admin_area_1')->nullable();
            $table->string('postal_code')->nullable();
            $table->float('amount', 20, 2)->nullable();
            $table->string('currency')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string("paymentSlip")->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
