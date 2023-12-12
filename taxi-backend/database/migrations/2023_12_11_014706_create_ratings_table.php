<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigIncrements('rating_id');
            $table->tinyInteger('rating');
            $table->unsignedBigInteger('rating_by');
            $table->unsignedBigInteger('rating_for');
            $table->unsignedBigInteger('ride_id');
            $table->foreign('rating_by')->references('user_id')->on('users');
            $table->foreign('rating_for')->references('user_id')->on('users');
            $table->foreign('ride_id')->references('ride_id')->on('rides');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratings');
    }
};
