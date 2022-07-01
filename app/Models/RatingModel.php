<?php

namespace App\Models;
use App\Models\User;
use App\Models\ContentModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingModel extends Model
{
    protected $table = 'ratings';
    protected $primarykey = 'rating_id';
    use HasFactory;
    function user()
    {
        return $this->belongsTo(User::class,'user_id','user_id');
    }
    function content()
    {
        return $this->belongsTo(ContentModel::class,'content_id','content_id');
    }
}
