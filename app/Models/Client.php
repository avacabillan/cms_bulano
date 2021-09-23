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
        return $this->hasOne(ModeofPayment::class);
    }
    public function business(){
        return $this->belongsTo(Business::class);
    }
    public function tin(){
        return $this->hasMany(Tin::class);
    }
    public function associate(){
        return $this->belongsTo(Associate::class);
    }
    
}
