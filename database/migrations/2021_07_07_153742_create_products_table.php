<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->default(1);
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->json('ingredients')->nullable();
            $table->text('name');
            $table->foreignId('product_category_id');
            $table->double('price')->nullable();
            $table->text('prep_time')->nullable();
            $table->json('size_pricing')->nullable();
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
        Schema::dropIfExists('products');
    }
}
