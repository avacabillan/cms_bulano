<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TaxForm;
use App\Models\TaxType;

class Taxes extends Component
{

    public $tax= [];
    
   
    public function render()
    {
        return view('livewire.taxes',[
            'tax' => TaxForm::all(),   
            
        ]);
    }
    public function getTax($id)
    {
       return $this->tax;
    }
}

