<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisteredAddress extends Model
{
    use HasFactory;
    protected $table = 'client_registered_address';
    protected $fillable =['city_name',
                          'province_name',
                          'postal_no',
                          'unit_house_no',
                          'street'
                        ];


   
   
    public function business(){
        return $this->hasMany(Business::class);
    } 
    public function client(){
        return $this->belongsTo(Client::class, 'client_id');
    }
    
}
 