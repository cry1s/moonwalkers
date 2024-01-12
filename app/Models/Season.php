<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Season extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'season',
    ];

    public function ratingLogs() : HasMany {
        return $this->hasMany(RatingLog::class);
    }
}
