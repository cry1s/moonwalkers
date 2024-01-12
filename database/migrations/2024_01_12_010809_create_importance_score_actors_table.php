<?php

use App\Models\Importance;
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
        Schema::create('importance_score_actors', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Importance::class);
            $table->unsignedInteger("score");
            $table->unsignedInteger("max_time");
            $table->timestamps();

            $table->foreign("importance_id")->references("id")->on("importances")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('importance_score_actors');
    }
};
