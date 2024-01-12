<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Importance extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'shared',
    ];

    protected $with = [
        "importanceScoreTechies",
        "importanceScoreActors"
    ];

    public function importanceScoreTechies() : HasMany {
        return $this->hasMany(ImportanceScoreTechie::class);
    }

    public function importanceScoreActors() : HasMany {
        return $this->hasMany(ImportanceScoreActor::class);
    }
}
