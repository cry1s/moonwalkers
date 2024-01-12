<?php

use App\Models\ProjectUser;
use App\Models\User;
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
        Schema::create('rotations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ProjectUser::class, 'worker_id');
            $table->foreignIdFor(User::class);
            $table->boolean('is_active');
            $table->timestamps();

            $table->foreign("worker_id")->references("id")->on("project_users")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign("user_id")->references("id")->on("users")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rotations');
    }
};
