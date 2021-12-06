<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasUuid;
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Appended properties
     *
     * @var string[]
     */
    protected $appends = [
        'photo_url',
    ];

    /**
     * @return string
     */
    public function getPhotoUrlAttribute(): string
    {
        return 'https://www.gravatar.com/avatar/' . md5(Str::lower($this->email)) . '.jpg?auto=format&fit=facearea&facepad=2&w=256&h=256&q=80&d=mp';
    }
}
