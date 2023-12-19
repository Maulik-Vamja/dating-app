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
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('custom_id')->nullable();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('country_id')->constrained('countries')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('state_id')->constrained('states')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('city_id')->constrained('cities')->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('is_primary', ['y', 'n'])->default('n')->nullable();
            $table->enum('is_active', ['y', 'n'])->default('y')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_addresses');
    }
};
