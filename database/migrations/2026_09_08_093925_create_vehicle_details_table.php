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
        Schema::create('vehicle_details', function (Blueprint $table) {
            $table->id();
            $table->string('registeredNo');
            $table->string('vehicleType');
            $table->string('driver');
            $table->string('cleaner');
            $table->string('pucFrom');
            $table->string('pucTo');
            $table->string('pucAmt');
            $table->string('insuranceFrom');
            $table->string('insuranceTo');
            $table->string('insuranceAmt');
            $table->string('fitnessFrom');
            $table->string('fitnessTo');
            $table->string('fitnessAmt');
            $table->string('permitFrom');
            $table->string('permitTo');
            $table->string('permitAmt');
            $table->string('session_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_details');
    }
};
