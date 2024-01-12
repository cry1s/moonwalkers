<?php

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
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Project::class);
            $table->unsignedInteger('number');
            $table->string('raw_source');
            $table->string('hardsub_source');
            $table->string('softsub_source');
            $table->enum('status', ['on_translate', 'on_voicing', 'on_editing', 'ready_for_release', 'released']);
            $table->timestamps();

            $table->foreign("project_id")->references("id")->on("projects")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
