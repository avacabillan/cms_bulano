<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisteredAddress extends Model
{
    use HasFactory;
    protected $table = 'client_registration_address';
    protected $fillable =['unit_house_no','street'];


   
    public function client(){
        return $this->hasMany(Client::class);
    }
    public function business(){
        return $this->belongsTo(Business::class);
    } 
    public function location(){
        return $this->belongsTo(LocationAddress::class, 'location_address_id');
    }
    
}
 