<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaxFile extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table ='client_tax_files';
    protected $fillable = ['tax_form_id', 
                           'client_id',
                           'file_name', 
                           'description', 
                           'uploaded_at'
    ];

   public function taxForms(){
    return $this->belongsTo(TaxForm::class);
    
   }
   public function clientTax(){
    return $this->hasMany(ClientTax::class);
    
   }
   public function archive(){
    return $this->hasMany(ArchivedForm::class);
    
   }
   public function clients(){
    return $this->belongsTo(Client::class);

}

}
