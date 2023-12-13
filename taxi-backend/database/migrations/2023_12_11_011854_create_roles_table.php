<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigInteger('role_id')->primary();
            $table->string('role');
        });
        DB::table('roles')->insert([
            ['role_id' => 1, 'role' => 'Admin'],
            ['role_id' => 2, 'role' => 'Driver'],
            ['role_id' => 3, 'role' => 'Passenger'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
