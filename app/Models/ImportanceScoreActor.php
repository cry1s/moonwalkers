<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImportanceScoreActor extends Model
{
    use HasFactory;

    protected $fillable = [
        'importance_id',
        'max_time',
        'score'
    ];

    public function importance() : BelongsTo {
        return $this->belongsTo(Importance::class);        
    }
}
