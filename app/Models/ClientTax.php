<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientTax extends Model
{
    use HasFactory,SoftDeletes;
    protected $table ='client_taxes';
    protected $dates = ['deleted_at'];
    protected $fillable =['client_id','tax_form_id'] ;


    public function clients(){
        return $this->belongsTo(Client::class);

    }
    public function taxForms(){
        return $this->belongsTo(TaxForm::class, 'tax_form_id');

    }
    public function taxFile(){
        return $this->belongsTo(TaxFile::class);

    }
    public function reminder(){
        return $this->hasMany(Reminder::class);

    }
}
