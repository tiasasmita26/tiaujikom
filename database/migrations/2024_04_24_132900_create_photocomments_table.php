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
        Schema::create('photocomments', function (Blueprint $table) {
            $table->BigIncrements('commentId');
            $table->string('comment_content');
            $table->date('date_of_comment');
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
        Schema::dropIfExists('photocomments');
    }
};
