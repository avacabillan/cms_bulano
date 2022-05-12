<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{

    use HasFactory,SoftDeletes, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $fillable = [
         'email', 'password',
    ];
   
    public function getIsAdminAttribute()
    {
        return $this->user()->where('role', 'admin')->exists();
    }
    public function clients()
    {
        return $this->belongsTo(Client::class,"id", "user_id");
    }
    public function associates()
    {
        return $this->belongsTo(Associate::class,"id", "user_id");
    }
    public function message()
    {
        return $this->belongsTo(Message::class,);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
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
}
