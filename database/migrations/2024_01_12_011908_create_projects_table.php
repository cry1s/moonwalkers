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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string("name", 255);
            $table->foreignIdFor(Importance::class)->nullable();
            $table->text("content");
            $table->string("poster_preview_link")->nullable();
            $table->enum("status", ["waiting", "in_work", "closed"]);
            $table->timestamps();

            $table->foreign("importance_id")->references("id")->on("importances")->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
