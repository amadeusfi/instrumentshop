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
            $table->string('status');

            $table->unsignedBigInteger('product_id')->nullable()->index();/* help the search*/;
            $table->foreign('product_id')->references('id')->on('orders')->onDelete('cascade');

            $table->unsignedBigInteger('customer_id')->nullable()->index();/* help the search*/;
            $table->foreign('customer_id')->references('id')->on('orders')->onDelete('cascade');

            $table->unsignedBigInteger('employee_id')->nullable()->index();/* help the search*/;
            $table->foreign('employee_id')->references('id')->on('orders')->onDelete('cascade');

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
