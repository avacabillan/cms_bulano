<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCity extends Model
{
    
    use HasFactory;
    protected $table ='client_city';
    
    protected $fillable = [
        "city_name",
    ];

    public function location(){
        return $this->hasMany(LocationAddress::class);
    }
    public function clientprovince(){
        return $this->belongsTo(ClientProvince::class, 'province_id');
    }
    public function clientpostal(){
        return $this->hasMany(Clientpostal::class);
    }
    
}
