<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tin extends Model
{
    use HasFactory;
    protected $table = 'client_tin';
    protected $fillable = ['tin_no','client_id'];
    
    public function client(){
        return $this->belongsTo(Client::class);
    }
}
