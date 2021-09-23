<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientPostal extends Model
{
    protected $table ='client_postal_no';
    use HasFactory;

    public function RegisteredAddress(){
        return $this->belongsTo(RegisteredAddress::class);
    }
    
    
}
