<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table ='admins';
    protected $fillable =[
        'birth_date','complete_address',
        'hired_date','phone_no',
        'email_address', 'department_id', 'user_id',
    ];
    public function department(){
        return $this->belongsTo(Department:: class, 'department_id','id');
    } 
    public function myuser()
    {
        return $this->hasOne(User::class,'id','user_id','name');
    }  
}
