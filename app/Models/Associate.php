<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Associate extends Model
{
    use HasFactory;
    protected $fillable = [
        'associate_name',
         'email',
         'contact_number',
        ];

    public function client(){
        return $this->hasMany(Client::class);
    }
    public function department(){
        return $this->hasOne(Department::class);
    }
}
