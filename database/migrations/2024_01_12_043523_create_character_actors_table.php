<?php

use App\Models\Character;
use App\Models\ProjectUser;
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
        Schema::create('character_actors', function (Blueprint $table) {
            $table->foreignIdFor(ProjectUser::class);
            $table->foreignIdFor(Character::class);
            $table->timestamps();

            $table->primary(["project_user_id", "character_id"]);
            $table->foreign("project_user_id")->references("id")->on("project_users")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("character_id")->references("id")->on("characters")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('character_actors');
    }
};
