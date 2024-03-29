<?php

use App\Models\Episode;
use App\Models\ProjectUser;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ProjectUser::class, 'worker_id');
            $table->foreignIdFor(Episode::class)->nullable();
            $table->text('content');
            $table->boolean('is_rated');
            $table->enum('status', ['in_work', 'in_approval', 'in_fixes', 'done']);
            $table->timestamps();

            $table->foreign("worker_id")->references("id")->on("project_users")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("episode_id")->references("id")->on("episodes")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
