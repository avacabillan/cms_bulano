<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Associate extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'assoc_name',
        'email',
        'sss_no',
        'contact_no',
        'birth_date',
        'start_date',
        'address',

        
    ];  
    public function department(){
        return $this->belongsTo(Department:: class);
    } 
    public function position(){
        return $this->belongsTo(Position:: class);
    }
    public function clients(){
        return $this->hasMany(Client:: class);
    }    
    public function myuser()
    {
        return $this->hasOne(User::class,"id","user_id");
    }      
}
