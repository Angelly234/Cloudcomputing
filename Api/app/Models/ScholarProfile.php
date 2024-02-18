<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class ScholarProfile extends Authenticatable
{
    use HasFactory;
    protected $table = 'scholars_profile';

    protected $primaryKey = 'scholars_profile_id';

    protected $fillable = [
        'scholars_id',
        'bio',
        'email',
        'work',
        'education',
        'experience',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'ban',
    ];

    public function papers(){
        return $this->hasMany(UploadPaper::class, 'scholars_id', 'scholars_id');
    }
}
