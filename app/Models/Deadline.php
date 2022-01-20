<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deadline extends Model
{
    use HasFactory;
    protected $table ='bulano_deadline';
    protected $fillable = [
        'title ','deadline', 'taxform_id'
    ];
    public function taxForm(){
        return $this-> belongsTo(TaxForm::class, 'taxform_id'); 
    }

}
