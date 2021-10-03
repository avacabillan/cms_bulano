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
        'contact_no',
        'birth_date',
        'start_date',

        
    ];  
    public function AssocDepartment(){
        return $this->hasMany(AssocDepartment:: class, 'department_id');
    } 
    public function AssocLocation(){
        return $this->belongsTo(AssocLocation:: class, 'assoc_location_id');
    }
    public function Guardian(){
        return $this->hasMany(Guardian:: class);
    } 
    public function GovSSS(){
        return $this->hasMany(GovSSS:: class);
    } 
    public function AssocPosition(){
        return $this->hasMany(AssocPosition:: class, 'assoc_position_id');
    }     

}
