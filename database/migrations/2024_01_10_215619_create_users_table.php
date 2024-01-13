<?php

use App\Models\HeadRole;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nickname');
            $table->text('content');
            $table->string('avatar_preview_link')->nullable();
            $table->text('voice_description');
            $table->foreignIdFor(HeadRole::class)->nullable();
            $table->string('vk_oauth_token')->unique()->nullable();
            $table->string('tg_oauth_token')->unique()->nullable();
            $table->boolean('approved')->default(false);
            $table->timestamps();

            $table->foreign("head_role_id")->references("id")->on("head_roles")->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
