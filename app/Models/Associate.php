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
        'hired_date',

        
    ];  
    public function departments(){
        return $this->belongsTo(Department:: class, 'department_id','id');
    } 
    public function positions(){
        return $this->belongsTo(Position:: class, 'position_id','id');
    }
    public function clients(){
        return $this->hasMany(Client:: class);
    }    
    public function myuser()
    {
        return $this->hasOne(User::class,"id","user_id");
    }      
}
