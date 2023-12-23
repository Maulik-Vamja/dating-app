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
        Schema::create('user_rates', function (Blueprint $table) {
            $table->id();
            $table->string('custom_id')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('rate_type_id')->nullable()->constrained('rate_types')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('rate')->nullable();
            $table->string('duration')->nullable();
            $table->foreignId('currency_id')->nullable()->constrained('currencies')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('description')->nullable();
            $table->enum('is_active', ['y', 'n'])->default('y')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_rates');
    }
};
