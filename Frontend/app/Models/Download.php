<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Download extends Authenticatable
{
    use HasFactory;
    protected $table = 'downloads';

    protected $primaryKey = 'downloads_id';

    protected $fillable = [
        'users_id',
        'upload_papers_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
