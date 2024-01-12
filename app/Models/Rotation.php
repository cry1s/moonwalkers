<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'worker_id',
        'is_active',
    ];

    public function worker() : BelongsTo {
        return $this->belongsTo(ProjectUser::class);
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
