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
            $table->timestamps();
            $table->float('subtotal');
            $table->integer('quantity');
            $table->unsignedBigInteger('liquorId');
            $table->foreign('liquorId')->references('id')->on('liquors');
            $table->unsignedBigInteger('wishlistId');
            $table->foreign('wishlistId')->references('id')->on('wishlists');
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
