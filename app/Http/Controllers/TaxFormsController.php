<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\TaxForm;
use App\Models\TaxType;
use RealRashid\SweetAlert\Facades\Alert;

class TaxFormsController extends Controller
{
    public function index(){
        $taxTypes= TaxType::all();
        $taxForms = TaxForm::pluck('tax_form_no');
        $schedules = Schedule::all();
        return view ('pages.admin.taxforms', compact('taxForms','taxTypes', 'schedules'));
    }
    public function addforms(Request $request){

        $forms = new TaxForm;
        $forms->tax_form_no = $request->tax_form_no;
        $forms->tax_type_id = $request->tax_type_id;
        $forms->schedule_id= $request->schedule_id;
        $forms->save();
        Alert::success('Success', 'Form Successfuly Added!');
        return redirect()->route('taxforms');
     }
}
