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
            $table->string("full_name")->nullable();
            $table->string('user_name')->unique()->nullable();
            $table->string("email")->unique()->nullable();
            $table->string("password")->nullable();
            $table->text("short_description")->nullable();
            $table->text("description")->nullable();
            $table->string('pronouns')->nullable();
            $table->enum('gender', ['male', 'female', 'non-binary'])->default('male')->nullable();
            $table->string('age')->nullable();
            $table->string('caters_to')->nullable();
            $table->string('body_type')->nullable();
            $table->integer('height')->nullable();
            $table->string('ethnicity')->nullable();
            $table->string('cup_size')->nullable();
            $table->string('hair_colour')->nullable();
            $table->string('shoe_size')->nullable();
            $table->string('eye_colour')->nullable();
            $table->datetime('last_logged_in')->nullable();
            $table->string('profile_photo')->nullable();
            $table->json('availibility')->nullable();
            $table->text('availibility_description')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->string('membership')->nullable();
            $table->string('contact_disclaimer')->nullable();
            // $table->foreignId("country_code")->nullable()->constrained("countries")
            //     ->cascadeOnUpdate()->cascadeOnDelete();
            // $table->string("contact_number")->nullable();

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
