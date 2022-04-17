<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    protected $table = 'role_user';
    protected $fillable = [
        'role_id', 'user_id',
    ];
    
    public function rolesUsers()
    {
        return $this->belongsToMany(User::class);
    }

}
