<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class MessageFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'message_id',
        'file_link',
        'preview_link',
    ];

    public function message() : BelongsTo {
        return $this->belongsTo(Message::class);
    }

    public function user() : HasOneThrough {
        return $this->hasOneThrough(User::class, Message::class);
    }
}
