<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'worker_id',
        'episode_id',
        'content',
        'is_rated',
    ];

    public function episode() : BelongsTo {
        return $this->belongsTo(Episode::class);
    }

    public function worker() : BelongsTo {
        return $this->belongsTo(ProjectUser::class);
    }
}
