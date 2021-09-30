<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Corporate;

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
    
}

