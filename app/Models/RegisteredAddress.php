<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisteredAddress extends Model
{
    use HasFactory;
    protected $table = 'client_registration_address';
    protected $fillable =['unit_house_no','street'];


    public function city(){
        return $this->hasOne(ClientCity::class);
    }
    public function postal(){
        return $this->hasOne(ClientPostal::class);
    }
    public function province(){
        return $this->hasOne(ClientProvince::class);
    }
    public function client(){
        return $this->hasMany(Client::class);
    }
    public function business(){
        return $this->belongsTo(Business::class);
    } 
}
 