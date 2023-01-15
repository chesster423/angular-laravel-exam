<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTablesAndOtherRequiredDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label', 100);
            $table->tinyInteger('vegetarian');
            $table->tinyInteger('status')->comment('1 - enabled | 0 - disabled');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('meals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('meal_sku', 100);
            $table->string('meal_name', 100);
            $table->string('vegetarian', 100);
            $table->string('meal_image', 250);
            $table->integer('status');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('delivery_date');
            $table->double('price', 15, 8)->nullable();
            $table->double('discounts', 15, 8)->nullable();
            $table->double('credits', 15, 8)->nullable();
            $table->double('vouchers', 15, 8)->nullable();
            $table->double('paid_price', 15, 8)->nullable();
            $table->enum('status', ['pending', 'paid', 'cancelled']);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('subscription_cycle_id');
            $table->double('price', 15, 8)->nullable();
            $table->double('discounts', 15, 8)->nullable();
            $table->double('credits', 15, 8)->nullable();
            $table->double('vouchers', 15, 8)->nullable();
            $table->double('paid_price', 15, 8)->nullable();
            $table->enum('status', ['pending', 'paid'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->string('sku');
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->string('image')->nullable();
            $table->double('price', 15, 8)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('products_structure', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned()->nullable();
            $table->string('meal_type')->nullable();
            $table->integer('no_meals')->nullable();
            $table->integer('order')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->date('delivery_date');
            $table->boolean('shipping')->default(false);
            $table->double('price', 15, 8);
            $table->timestamps();
        });

        Schema::create('subscriptions_cycles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('subscription_id');
            $table->date('delivery_date');
            $table->boolean('shipping')->default(false);
            $table->double('price', 15, 8);
            $table->timestamps();
        });

        Schema::create('subscriptions_selections', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('subscription_cycle_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('meal_id');
            $table->string('meal_type')->nullable();
            $table->date('delivery_date');
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
        Schema::dropIfExists('menu');
        Schema::dropIfExists('meals');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('products');
        Schema::dropIfExists('products_structure');
        Schema::dropIfExists('subscriptions');
        Schema::dropIfExists('subscriptions_cycles');
        Schema::dropIfExists('subscriptions_selections');
    }
}
