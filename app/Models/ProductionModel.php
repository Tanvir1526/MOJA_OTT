<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionModel extends Model
{
    use HasFactory;
    function admin()
    {
        return $this->hasOne(admin::class, 'user_id', 'user_id');
    }
}
