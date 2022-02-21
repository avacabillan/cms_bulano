<?php

namespace App\Http\Controllers;
use App\Models\TaxForm;
use App\Models\TaxType;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class TaxFormsController extends Controller
{
    public function addforms(Request $request){

       $forms = new TaxForm;
       $forms->tax_form_no = $request->tax_form_no;
       $forms->tax_type_id = $request->tax_type_id;
       $forms->save();
       Alert::success('Success', 'Form Successfuly Added!');
       return redirect()->route('taxforms');
    }
    public function index(){
        $taxTypes= TaxType::all();
        $taxForms = TaxForm::pluck('tax_form_no');
        return view ('pages.admin.taxforms', compact('taxForms','taxTypes'));
    }
}