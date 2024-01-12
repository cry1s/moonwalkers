<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'nummber',
        'raw_source',
        'hardsub_source',
        'softsub_source',
        'status'
    ];

    public function project() : BelongsTo {
        return $this->belongsTo(Project::class);
    }

    public function tasks() : HasMany {
        return $this->hasMany(Task::class);
    }
}
