<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nickname',
        'content',
        'avatar_preview_link',
        'voice_description',
        'head_role_id',
        'vk_oauth_token',
        'tg_oauth_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'vk_oauth_token',
        'tg_oauth_token'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tg_oauth_token' => 'hashed',
        'vk_oauth_token' => 'hashed',
    ];

    protected $with = [
        'userWorkRoles',
    ];

    public function userWorkRoles() : HasMany {
        return $this->hasMany(UserWorkRole::class);
    }

    public function activityLogs() : HasMany {
        return $this->hasMany(ActivityLog::class);
    }

    public function ratingLogs() : HasMany {
        return $this->hasMany(RatingLog::class);
    }
}
