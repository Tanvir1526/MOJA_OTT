<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primarykey = 'id';
    public $timestamps = false;
    

    use HasFactory;
    function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
