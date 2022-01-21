<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDelete;

class Requester extends Model
{
    use HasFactory,SoftDeletes;
    protected $table ='requesters';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'email', 'contact_no','status', 'cor_img'
    ];
}
