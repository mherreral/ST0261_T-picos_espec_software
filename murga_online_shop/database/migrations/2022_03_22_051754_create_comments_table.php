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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('description');
            $table->integer('score');
            $table->unsignedBigInteger('customerId');
            $table->foreign('customerId')->references('id')->on('users');
            $table->unsignedBigInteger('liquorId');
            $table->foreign('liquorId')->references('id')->on('liquors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
