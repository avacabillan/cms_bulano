<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssocProvince extends Model
{
    use HasFactory;
    protected $table ='assoc_province';
    
    protected $fillable =[
        "province_name",
    ];

    
    public function city(){
        return $this->hasMany(AssoctCity::class);
    }
}
