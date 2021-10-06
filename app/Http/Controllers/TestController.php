<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Corporate;
use App\Models\TaxForm;
use App\Models\TaxType;

class TestController extends Controller
{
   
    public function getGroups()
    {
        $groups = DB::table('tbl_groups')
                ->pluck("group_name","id");
               
        return view('welcome')->with(compact('groups', $groups));
    }

    public function getSubCorporates($id)
    {
        $subCorporates = DB::table("client_corporates")
                    ->where("group_id",$id)
                    ->pluck("corporate_name","id");

       return view('welcome')->with(compact('subCorporates',$subCorporates));
    }
    public function showTax(){
        $taxTypes = TaxType::all();
        $forms = TaxForm::orderBy('id','asc')->where('tax_type_id', 1)->get();
        return view('welcome')-> with (compact("forms", $forms, "taxTypes",$taxTypes));
    }
    // public function getUser($userId)
    // {
    //     $client = Client::find($userId);
    //     return view('pages.associate.clients.clients_list')->with("client", $client);
    // }
    
    public function showClientProfile($id)
    {
        $client = Client::find($id);
        return view('showClientProfile')->with("client", $client);
    }
    
    
}

