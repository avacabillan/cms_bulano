<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corporate extends Model
{
    use HasFactory;
    protected $table = 'client_corporates';

    public function group(){
        return $this->belongsTo(Group::class);
    }
    public function business(){
        return $this->belongsTo(Business::class);
    }
}
