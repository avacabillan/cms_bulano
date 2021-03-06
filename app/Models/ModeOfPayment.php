<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeOfPayment extends Model
{
    use HasFactory;
    protected $table= 'client_mode_of_payment';
    
    
    public function clients(){
        return $this->hasMany(Client::class);
    }
    public function requestee(){
        return $this->hasMany(Requestee::class);
    }
    
}
