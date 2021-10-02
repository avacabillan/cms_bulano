<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssocPostal extends Model
{
    use HasFactory;
    protected $table ='assoc_postal';

    protected $fillable = [
        "postal_no",
    ];
    
    public function assoclocation(){
        return $this->hasMany(AssocLocation::class);
    }
    public function assoccity(){
        return $this->belongsTo(AssocCity::class, 'assoc_city_id');
    }
}
