<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Authenticatable
{
    use HasFactory;
    protected $table = 'users_profile';

    protected $primaryKey = 'users_profile_id';

    protected $fillable = [
        'bio',
        'email',
        'users_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'ban',
    ];
}
