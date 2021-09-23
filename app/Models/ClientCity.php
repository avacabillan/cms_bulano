<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCity extends Model
{
    protected $table ='client_city';
    use HasFactory;

    public function RegisteredAddress(){
        return $this->belongsTo(RegisteredAddress::class);
    }
    
}
