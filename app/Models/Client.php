<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{   
    
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'client_name',
        'email',
        'contact_number',
        'ocn',
        
        
        
    ];  
    public function modeofpayment(){
        return $this->belongsTo(ModeofPayment::class,'mode_of_payment_id');
    }
    public function business(){
        return $this->hasMany(Business::class);
    }
    public function registeredAddress(){
        return $this->hasMany(RegisteredAddress::class);
    }
    public function tin(){
        return $this->hasMany(Tin::class);
    }
    // public function associate(){
    //     return $this->hasMany(Associate::class);
    // }
    public function clientTaxes(){
        return $this->hasMany(ClientTax::class);

    }
    
}
