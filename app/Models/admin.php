<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user;
use App\Models\ProductionModel;

class admin extends Model
{
    use HasFactory;
    protected $table = 'admins';
    protected $primaryKey = 'admin_id';
    function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    function production()
    {
        return $this->belongsTo(User::class, 'production_id', 'production_id');
    }
}
