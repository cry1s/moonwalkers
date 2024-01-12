<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectUser extends Pivot
{
    use HasFactory;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
    public $foreignKey = "project_user_id";

    public function characters() : BelongsToMany {
        return $this->belongsToMany(Character::class, "character_actors");
    }

    public function tasks() : HasMany {
        return $this->hasMany(Task::class);
    }

    public function rotations() : HasMany {
        return $this->hasMany(Rotation::class);
    }
}
