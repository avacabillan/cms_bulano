<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requester extends Model
{
    use HasFactory;
    protected $table ='requesters';

    protected $fillable = [
        'name', 'email', 'contact_no','status', 'cor_img'
    ];
}
