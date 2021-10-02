<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssocLocation extends Model
{
    use HasFactory;
    protected $table ='assoc_location_address';

    public function completeAddress(){
        return $this->hasMany(AssocPostal::class);
    }
}
