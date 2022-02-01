<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientTax extends Model
{
    use HasFactory;
    protected $table ='client_taxes';
    protected $fillable =['client_id','tax_form_id'] ;


    public function clients(){
        return $this->belongsTo(Client::class);

    }
    public function taxForms(){
        return $this->belongsTo(TaxForm::class, 'tax_form_id');

    }
    public function reminder(){
        return $this->hasMany(Reminder::class);

    }
}
