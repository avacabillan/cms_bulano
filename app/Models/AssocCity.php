<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssocCity extends Model
{
    use HasFactory;
    protected $table ='assoc_city';
    
    protected $fillable = [
        "city_name",
    ];
    public function AssocProvince(){
        return $this->belongsTo(AssocProvince::class, 'assoc_province_id');
    }
    public function AssocPostal(){
        return $this->hasMany(AssocPostal::class);
    }
} 
