<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientProvince extends Model
{
   
    use HasFactory;

    protected $table ='client_province';
    
    protected $fillable =[
        "province_name",
    ];

    
    public function city(){
        return $this->hasMany(ClientCity::class);
    }
      
}
