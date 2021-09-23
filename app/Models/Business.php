<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $table= 'client_business';
    use HasFactory;
    
    public function clients(){
        return $this->hasMany(Client::class);
    }
    public function RegisteredAddress(){
        return $this->hasMany(RegisteredAddress::class);
    }
    public function corporate(){
        return $this->belongsTo(Corporate::class);
    }
   
}
