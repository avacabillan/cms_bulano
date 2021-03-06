<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxType extends Model
{
    use HasFactory;
    protected $table ='client_tax_type';

    public function taxForm(){
        return $this-> hasMany(TaxForm::class); 
    }
    public function taxFile(){
        return $this->hasMany(TaxFile::class);
    }
}
