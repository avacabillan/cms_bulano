<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationAddress extends Model
{
    use HasFactory;
    protected $table ='client_location_address';

    public function clientPostal(){
        return $this->belongsTo(ClientPostal::class, 'client_postal_id');
    }
    public function RegisteredAddress(){
        return $this->hasMany(RegisteredAddress::class);
    }

}
