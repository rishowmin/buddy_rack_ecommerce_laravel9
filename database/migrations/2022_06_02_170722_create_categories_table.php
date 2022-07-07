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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('categoryName');
            $table->longText('description');
            $table->string('image')->nullable();
            $table->string('parentCategory');
            $table->string('displayOrder');
            $table->string('seoPageName');
            $table->string('metaTitle');
            $table->string('metaKeywords');
            $table->mediumText('metaDescription');
            $table->tinyInteger('published')->default('1')->comment('0=Unpublished,1=Published');
            $table->tinyInteger('isActive')->default('1')->comment('0=Inactive,1=Active');
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
        Schema::dropIfExists('categories');
    }
};
