<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImportanceScoreActor extends Model
{
    use HasFactory;

    public function importance() : BelongsTo {
        return $this->belongsTo(Importance::class);        
    }
}