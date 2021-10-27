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
    protected $fillable = ['tax_type_id', 
                           'file_name', 
                           'description', 
                           'uploaded_at'
    ];

   public function taxType(){
    return $this->belongsTo(TaxType::class);
    
   }public function archive(){
    return $this->hasMany(ArchivedForm::class);
    
   }

}
