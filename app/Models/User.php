<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\PremiumModel;
use App\Models\ContentModel;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $primaryKey = 'user_id'; 
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'email_verified_at',
        'pro_pic',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
     
    function admin()
    {
        return $this->hasOne(admin::class, 'user_id', 'user_id');
    }
    function premium()
    {
        return $this->hasMany(PremiumModel::class, 'user_id', 'user_id');
    }
    function content()
    {
        return $this->hasMany(ContentModel::class, 'user_id', 'user_id');
    }
}
