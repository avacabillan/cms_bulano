<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssocPostal extends Model
{
    use HasFactory;
    protected $table ='assoc_postal_no';

    protected $fillable = [
        "postal_no",
    ];
    
    public function location(){
        return $this->belongsTo(AssocLocationAddress::class);
    }
}
