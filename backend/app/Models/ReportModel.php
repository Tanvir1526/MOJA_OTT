<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\ContentModel;

class ReportModel extends Model
{
    protected $table = 'reports';
    protected $primarykey = 'report_id';
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
