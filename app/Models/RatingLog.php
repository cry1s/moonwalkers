<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RatingLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'season_id',
        'score',
    ];

    protected $with = [
        'season'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);        
    }

    public function season() : BelongsTo {
        return $this->belongsTo(Season::class);
    }
}
