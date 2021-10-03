<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssocLocation extends Model
{
    use HasFactory;
    protected $table ='assoc_location';

    public function assocpostal(){
        return $this->belongsTo(AssocPostal::class, 'assoc_postal_id');
    }
    public function AssocAddress(){
        return $this->hasMany(AssocAddress::class);
    }
}
