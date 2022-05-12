<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{   
    
    use HasFactory,SoftDeletes;
    public $timestamps = true;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        
        'company_name',
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
        return $this->hasMany(Business::class, 'client_id');
    }
    public function registeredAddress(){
        return $this->hasMany(RegisteredAddress::class);
    }
    public function tin(){
        return $this->hasMany(Tin::class, 'client_id');
    }
    public function associates(){
        return $this->belongsTo(Associate::class, 'assoc_id');
    }
   
    public function taxForms(){
        return $this->hasMany(TaxForm::class);
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
    public function myuser()
    {
        return $this->hasOne(User::class,"id","user_id");
    }
    
}
