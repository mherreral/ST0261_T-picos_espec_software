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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float('subtotal');
            $table->integer('quantity');
            $table->unsignedBigInteger('liquor_id');
            $table->foreign('liquor_id')->references('id')->on('liquors')->onDelete('cascade');
            $table->unsignedBigInteger('wishlist_id');
            $table->foreign('wishlist_id')->references('id')->on('wishlists')->onDelete('cascade');
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
