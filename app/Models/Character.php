<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'picture_preview_link',
    ];

    public function projects() : BelongsToMany {
        return $this->belongsToMany(Project::class, "project_characters");
    }

    public function actors() : BelongsToMany {
        return $this->belongsToMany(ProjectUser::class, "character_actors");
    }
}
