<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'link',
        'for_techie',
    ];

    public function task() : BelongsTo {
        return $this->belongsTo(Task::class);
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
