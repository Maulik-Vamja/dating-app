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
        Schema::create('user_contact_media', function (Blueprint $table) {
            $table->id();
            $table->string('custom_id')->nullable();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('contact_media_id')->constrained('contact_media')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('value')->nullable();
            $table->enum('is_active', ['y', 'n'])->default('y')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_contact_media');
    }
};
