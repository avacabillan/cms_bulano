<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientProvince extends Model
{
    protected $table ='client_province';
    use HasFactory;

    
    public function RegisteredAddress(){
        return $this->belongsTo(RegisteredAddress::class);
    }
}
