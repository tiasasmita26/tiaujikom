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
        Schema::create('photolikes', function (Blueprint $table) {
            $table->BigIncrements('likeId');
            $table->date('date_like');
            $table->UnsignedBigInteger('photoId');
            $table->foreign('photoId')->references('photoId')->on('photos')->onDelete('cascade');
            $table->UnsignedBigInteger('userId');
            $table->foreign('userId')->references('userId')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('photolikes');
    }
};
