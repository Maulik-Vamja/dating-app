<?php

use App\Enums\StatusEnums;
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
        Schema::create("cms_pages", function (Blueprint $table) {
            $table->id();

            $table->foreignId("edited_by")->nullable()->constrained("admins")->cascadeOnUpdate()->cascadeOnDelete();
            $table->string("title")->nullable();
            $table->string("slug")->nullable();
            $table->string("description")->nullable();
            $table->string("file")->nullable();
            $table->tinyInteger("is_active")->default((StatusEnums::ACTIVE)->value);
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
        Schema::dropIfExists("cms_pages");
    }
};
