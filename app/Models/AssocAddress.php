<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssocAddress extends Model
{
    use HasFactory;
    protected $table ='assoc_address';
    
    protected $fillable = [
        "house_no_and_street",
    ];

    public function AssocLocation(){
        return $this->belongsTo(AssocLocation::class, 'assoc_location_id');
    }
}
