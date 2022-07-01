<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PremiumModel extends Model
{
    use HasFactory;
    protected $table = 'premiumsubs';
    protected $primaryKey = 'premium_id';
    function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
