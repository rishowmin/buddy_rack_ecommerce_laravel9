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
        Schema::create('manufacturers', function (Blueprint $table) {
            $table->id();
            $table->string('manufacturerName');
            $table->longText('description');
            $table->string('image')->nullable();
            $table->string('officialWebsite');
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
        Schema::dropIfExists('manufacturers');
    }
};
