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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_category_id');
            $table->unsignedBigInteger('unit_id');
            $table->string('name');
            $table->double('price', 2);
            $table->integer('unit_value_of_price');
            $table->double('special_discount', 2)->nullable();
            $table->boolean('enabled')->default(false);
            $table->boolean('out_of_stock')->default(false);
            $table->longText('description')->nullable();
            $table->string('photo')->nullable();

            $table->foreign('item_category_id')->references('id')->on('item_categories')->onDelete('cascade');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');

            // Restaurant Tenant
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
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
        Schema::dropIfExists('items');
    }
};
