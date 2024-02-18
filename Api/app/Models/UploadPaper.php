<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class UploadPaper extends Authenticatable
{
    use HasFactory;
    use HasFactory;
    protected $table = 'upload_papers';

    protected $primaryKey = 'upload_papers_id';

    protected $fillable = [
        'scholars_id',
        'title',
        'description',
        'website',
        'file',
        'publish_date'
    ];

    protected $hidden = [
        'ban',
        'created_at',
        'updated_at',
    ];

    //make relationship
    public function user(){
        return $this->belongsTo(Scholar::class, 'scholars_id', 'scholars_id');
    }

    public function papers(){
        return $this->hasMany(UploadPaper::class, 'scholars_id');
    }


}
