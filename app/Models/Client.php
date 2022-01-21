<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{   
    
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'client_name',
        'email_address',
        'contact_number',
        'ocn',
        
        
        
    ];  
    public function modeofpayment(){
        return $this->belongsTo(ModeofPayment::class,'mode_of_payment_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function business(){
        return $this->hasMany(Business::class);
    }
    public function registeredAddress(){
        return $this->hasMany(RegisteredAddress::class);
    }
    public function tin(){
        return $this->hasOne(Tin::class);
    }
    public function associate(){
        return $this->belongsTo(Associate::class, 'assoc_id');
    }
    public function clientTaxes(){
        return $this->hasMany(ClientTax::class);

    }
    public function reminder(){
        return $this->hasMany(Reminder::class);

    }
    public function taxFile(){
        return $this->hasMany(TaxFile::class);

    }
    
}
