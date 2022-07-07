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
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('attributeName');
            $table->longText('description')->nullable();
            $table->string('attributeType');
            $table->string('displayOrder');
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
        Schema::dropIfExists('product_attributes');
    }
};
