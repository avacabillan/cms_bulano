<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tin extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'client_tin';
    protected $dates = ['deleted_at'];
    protected $fillable = ['tin_no'];
    
    public function client(){
        return $this->belongsTo(Client::class);
    }
}
