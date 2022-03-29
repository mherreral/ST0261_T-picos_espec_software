<?php

//Authors: Manuela Herrera López, Samuel Palacios

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
        Schema::create('liquors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('liquor_type');
            $table->string('brand');
            $table->float('price');
            $table->integer('stock')->default(100);
            $table->string('presentation');
            $table->integer('milliliters');
            $table->string('image')->default('/img/food.jpg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('liquors');
    }
};
