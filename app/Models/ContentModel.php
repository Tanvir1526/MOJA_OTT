<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ContentModel extends Model
{
    use HasFactory;
    protected $table = 'contents';
    protected $primarykey = 'content_id';
    function user()
    {
        return $this->belongsTo(User::class,'user_id','user_id');
    }
}
