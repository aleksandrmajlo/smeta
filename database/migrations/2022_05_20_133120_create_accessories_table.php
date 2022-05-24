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
        Schema::create('accessories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->bigInteger('price')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
        Schema::create('accessorie_roof', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('accessorie_id')->unsigned()->index();
            $table->integer('roof_id')->unsigned()->index();
            $table->unique(['accessorie_id', 'roof_id'], 'accessorie_roof');
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
        Schema::dropIfExists('accessories');
    }
};
