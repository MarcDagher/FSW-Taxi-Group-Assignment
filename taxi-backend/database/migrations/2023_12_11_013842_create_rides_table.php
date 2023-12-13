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
        Schema::create('rides', function (Blueprint $table) {
            $table->bigIncrements('ride_id');
            $table->string('pickup_location');
            $table->string('destination_location');
            $table->enum('status', ['pending', 'accepted', 'cancelled']);
            $table->decimal('ride_price', 5, 2);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->timestamp('accepted_at')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('driver_id')->references('driver_id')->on('drivers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rides');
    }
};
