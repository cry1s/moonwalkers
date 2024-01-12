<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'project_id',
        'content',
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function project() : BelongsTo {
        return $this->belongsTo(Project::class);
    }
}
