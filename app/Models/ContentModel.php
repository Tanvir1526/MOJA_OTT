<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\RatingModel;
use App\Models\ReportModel;
use App\Models\MyListModel;

class ContentModel extends Model
{
    use HasFactory;
    protected $table = 'contents';
    protected $primarykey = 'content_id';
    function user()
    {
        return $this->belongsTo(User::class,'user_id','user_id');
    }
    function rating()
    {
        return $this->hasMany(RatingModel::class, 'user_id', 'user_id');
    }
    function report()
    {
        return $this->hasMany(ReportModel::class, 'user_id', 'user_id');
    }
    function mylist()
    {
        return $this->hasMany(MyListModel::class, 'content_id', 'content_id');
    }

}
