<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class TokenModel extends Model
{
    protected $table = 'tokens';
    protected $primarykey = 'token_id';
    public $timestamps = false;
    use HasFactory;

    function user()
    {
        return $this->belongsTo(User::class,'user_id','user_id');
    }
}
