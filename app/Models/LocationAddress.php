<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationAddress extends Model
{
    use HasFactory;
    protected $table ='client_location_address';

    public function completeAddress(){
        return $this->hasMany(ClientPostal::class);
    }
    public function RegisteredAddress(){
        return $this->hasMany(RegisteredAddress::class);
    }

}
