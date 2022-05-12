<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegisteredAddress extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'client_registered_address';
    protected $dates = ['deleted_at'];
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
 