<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDelete;

class Requestee extends Model
{
    use HasFactory;
    protected $table ='requestee';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'email','cor','path'
    ];
}
