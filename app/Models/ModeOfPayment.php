<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeOfPayment extends Model
{
    protected $table= 'client_mode_of_payment';
    use HasFactory;
    
    public function clients(){
        return $this->belongsTo(Client::class);
    }
}
