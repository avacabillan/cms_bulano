<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientTax extends Model
{
    use HasFactory;
    protected $table ='client_taxes';

    public function clients(){
        return $this->belongsTo(Client::class, 'client_id');

    }
    public function taxForms(){
        return $this->belongsTo(TaxForm::class, 'tax_form_id');

    }
}
