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
    public function location(){
        return $this->hasMany(AssocLocationAddress::class);
    }
    public function assocprovince(){
        return $this->belongsTo(AssocProvince::class, 'province_id');
    }
} 
