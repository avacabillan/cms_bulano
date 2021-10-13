<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tin extends Model
{
    use HasFactory;
    protected $table = 'client_tin';
    protected $fillable = ['client_id','tin_no'];
    
    public function client(){
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}
