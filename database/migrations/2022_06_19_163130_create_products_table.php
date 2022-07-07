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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productName');
            $table->mediumText('shortDescription');
            $table->longText('fullDescription')->nullable();
            $table->string('sku')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->string('manufacturer')->nullable();
            $table->tinyInteger('trending')->default('0')->comment('0=Not Trending,1=Trending')->nullable();
            $table->tinyInteger('markAsNew')->default('0')->comment('0=Old,1=New')->nullable();
            $table->string('productType')->nullable();
            // $table->string('productAttribute')->nullable();
            $table->string('displayOrder')->nullable();
            $table->integer('price');
            $table->integer('oldPrice')->nullable();
            $table->integer('productCost')->nullable();
            $table->string('inventoryMethod')->nullable();
            $table->string('stockQuantity');
            $table->string('warehouse')->nullable();
            $table->string('minCartQuantity')->nullable();
            $table->string('maxCartQuantity')->nullable();
            $table->string('seoPageName');
            $table->string('metaTitle')->nullable();
            $table->string('metaKeywords')->nullable();
            $table->mediumText('metaDescription')->nullable();
            $table->tinyInteger('published')->default('1')->comment('0=Unpublished,1=Published');
            $table->tinyInteger('isActive')->default('1')->comment('0=Inactive,1=Active');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
};
