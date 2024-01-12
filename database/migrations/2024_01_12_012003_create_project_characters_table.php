<?php

use App\Models\Character;
use App\Models\Project;
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
        Schema::create('project_characters', function (Blueprint $table) {
            $table->foreignIdFor(Project::class);
            $table->foreignIdFor(Character::class);
            $table->timestamps();

            $table->primary(["project_id", "character_id"]);
            $table->foreign("project_id")->references("id")->on("projects")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("character_id")->references("id")->on("characters")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_characters');
    }
};
