<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('name')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->double('delivery_cost')->nullable();
            $table->integer('delivery_limit')->nullable();
            $table->string('open_time')->nullable();
            $table->string('close_time')->nullable();
            $table->boolean('active')->default(1);
            $table->text('logo')->nullable();
            $table->text('header_image')->nullable();
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
        Schema::dropIfExists('stores');
    }
}
