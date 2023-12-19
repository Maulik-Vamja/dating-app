<?php

use App\Enums\StatusEnums;
use App\Enums\User\UserStatusEnums;
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
        Schema::create("users", function (Blueprint $table) {
            $table->id();

            $table->string("custom_id")->nullable();
            $table->string("first_name")->nullable();
            $table->string("last_name")->nullable();
            $table->string("email")->unique()->nullable();
            $table->string("password")->nullable();

            $table->foreignId("country_code")->nullable()->constrained("countries")
                        ->cascadeOnUpdate()->cascadeOnDelete();

            $table->string("contact_number")->nullable();
            $table->string("profile_photo")->nullable();

            $table->tinyInteger("is_active")->default((StatusEnums::ACTIVE)->value);

            $table->timestamp("email_verified_at")->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("users");
    }
};
