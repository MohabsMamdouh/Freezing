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
        Schema::create('site_infos', function (Blueprint $table) {
            $table->id();
            $table->string('website_title');
            $table->string('website_arabic');
            $table->string('email');
            $table->string('website_logo');
            $table->string('website_favicon');
            $table->string('meta_keyword');
            $table->string('meta_description');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('address');
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
        Schema::dropIfExists('site_infos');
    }
};
