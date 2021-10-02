<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxForm extends Model
{
    use HasFactory;
    protected $table ='client_tax_forms';

    public function taxType(){
        return $this-> belongsTo(TaxType::class, 'tax_type_id'); 
    }
}
