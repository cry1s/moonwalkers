<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
}
