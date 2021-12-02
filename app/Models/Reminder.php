<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    use HasFactory;
    protected $table = 'reminders';
     protected $fillable = [
        'reminder','color', 'start', 'end'
    ];



    public function clienttax(){
        return $this->belongsTo(ClientTax::class);

    }
    
    public function client(){
        return $this->belongsTo(Client::class);

    }
}
