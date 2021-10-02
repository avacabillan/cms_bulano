<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssocPosition extends Model
{
    use HasFactory;
    protected $table ='assoc_position';

    
    public function Associate(){
        return $this->belongsTo(Associate:: class, 'assoc_position_id');
    }
}
