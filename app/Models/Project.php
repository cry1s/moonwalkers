<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'importance_id',
        'content',
        'poster_preview_link',
        'status'
    ];

    public function characters() : BelongsToMany {
        return $this->belongsToMany(Character::class, "project_characters");
    }

    public function importance() : BelongsTo {
        return $this->belongsTo(Importance::class);
    }

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class)->using(ProjectUser::class);
    }

    public function episodes(): HasMany {
        return $this->hasMany(Episode::class);
    }

    public function messages(): HasMany {
        return $this->hasMany(Message::class);
    }
}
