<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myuser extends Model
{
    use HasFactory;
    protected $table ='myusers';

    protected $fillable = [
     'username', 'password',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class,"id", "user_id");
    }
    public function associate()
    {
        return $this->belongsTo(Associate::class,"id", "user_id");
    }
}
