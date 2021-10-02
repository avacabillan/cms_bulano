<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssocPosition extends Model
{
    use HasFactory;
    protected $table ='assoc_position';

    protected $fillable = [
        "position_name",
    ];
    
    public function departmeny(){
        return $this->belongsTo(AssocDepartment::class);
    }
}
