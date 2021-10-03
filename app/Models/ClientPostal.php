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

    
    public function location(){
        return $this->hasMany(LocationAddress::class);
    }
    public function clientcity(){
        return $this->belongsTo(ClientPostal::class, 'client_city_id');
    }
} 
