<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssocDepartment extends Model
{
    use HasFactory;
    protected $table ='assoc_department';

    protected $fillable = [
        "department_name",
    ];
    
    public function Associate(){
        return $this->belongsTo(Associate:: class, 'assoc_department_id');
    } 
}
