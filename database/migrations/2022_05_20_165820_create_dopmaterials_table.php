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
        Schema::create('dopmaterials', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->bigInteger('price')->nullable();
            $table->string('price_type')->default('руб.')->comment('По умолчанию руб. % м.п.');
            $table->integer('order')->default(0);

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
        Schema::dropIfExists('dopmaterials');
    }
};
