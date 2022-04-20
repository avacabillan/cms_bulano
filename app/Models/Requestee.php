<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Requestee extends Model
{
    use HasFactory;
    use SoftDeletes, Notifiable;

    protected $dates = ['deleted_at'];
    protected $table ='requestee';
    

    protected $fillable = [
        'name', 'email','cor',
    ];
    
}
