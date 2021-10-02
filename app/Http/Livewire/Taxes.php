<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TaxForm;

class Taxes extends Component
{

    public $taxForms= [];
   
    public function render()
    {
        return view('livewire.taxes');
    }
    public function getTax($form)
    {
       return $this->taxForms;
    }
}

