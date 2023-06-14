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
            $table->foreignId('user_id');
            $table->text('address')->nullable();
            $table->boolean('collect_status')->nullable();
            $table->boolean('delivery_status')->nullable();
            $table->text('duration')->nullable();
            $table->text('distance')->nullable();
            $table->text('driver_latitude')->nullable();
            $table->text('driver_longitude')->nullable();
            $table->text('latitude')->nullable();
            $table->text('longitude')->nullable();
            $table->json('order');
            $table->text('order_type');
            $table->boolean('food_rating')->nullable();
            $table->string('rating_description')->nullable();
            $table->boolean('driver_rating')->nullable();
            $table->string('driver_rating_description')->nullable();
            $table->integer('status');
            $table->boolean('skip_comment')->nullable();
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
