<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    
    use HasFactory;
  
    // public $timestamps = true;

    protected $table= 'client_business';
    public $timestamps = true;

    protected $fillable = [
        'trade_name', 
        'registration_date',
        'client_id',
        'registered_address_id',
        'corporate_id',
    ];
    
    
    public function clients(){
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function RegisteredAddress(){
        return $this->belongsTo(RegisteredAddress::class);
    }
    public function corporate(){
        return $this->belongsTo(Corporate::class);
    }
   
}
