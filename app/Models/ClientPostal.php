<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientPostal extends Model
{
   
    use HasFactory;

    protected $table ='client_postal_no';

    protected $fillable = [
        "postal_no",
    ];

    public function RegisteredAddress(){
        return $this->belongsTo(RegisteredAddress::class);
    }
    
    public function location(){
        return $this->belongsTo(LocationAddress::class);
    }
    
}
