<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssocDepartment extends Model
{
    use HasFactory;
    protected $table ='department';

    public function position(){
        return $this->hasOne(Position::class);
    }
}
