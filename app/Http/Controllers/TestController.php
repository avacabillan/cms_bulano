<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\DemoEmail;
use Symfony\Component\HttpFoundation\Response;
// use App\Models\Group;
// use App\Models\Corporate;
// use App\Models\TaxForm;
// use App\Models\TaxType;

class TestController extends Controller
{
   
    // public function sendEmail() {
    //     $email = 'avacabillan08@gmail.com';
   
    //     $mailData = [
    //         'title' => 'Demo Email',
    //         'url' => 'https://www.w3adda.com'
    //     ];
  
    //     Mail::to($email)->send(new DemoEmail($mailData));
   
    //     return response()->json([
    //         'message' => 'Email has been sent.'
    //     ], Response::HTTP_OK);
    // }


    // public function getGroups()
    // {
    //     $groups = DB::table('tbl_groups')
    //             ->pluck("group_name","id");
               
    //     return view('welcome')->with(compact('groups', $groups));
    // }

    // public function getSubCorporates($id)
    // {
    //     $subCorporates = DB::table("client_corporates")
    //                 ->where("group_id",$id)
    //                 ->pluck("corporate_name","id");

    //    return view('welcome')->with(compact('subCorporates',$subCorporates));
    // }
    // public function showClientProfile(){
    //     //count the client who has tax form no 1701Q
    // //    $client= DB::table('client_taxes')
    // //    ->where('tax_form_id','2')
    // //    ->orderBy('client_id')
    // //    ->get();

    //    // count the number of clients
    // //    $clients = DB::table('clients')->count();

    //     //select tax form no by tax type if under vat form no will print
    //     // $test = DB::table('client_tax_forms')
    //     // ->where('tax_type_id',1)
    //     // ->get();

    //     //get lients who has tax vat include slecting specific column on blade
    //     // $test = DB::table('client_taxes')
    //     //  ->whereIn('tax_form_id',[1,2,3,4])
    //     //  ->get();

    // //
    // $test = DB::table('clients')
    // ->join('client_mode_of_payment', 'clients.mode_of_payment_id','=','client_mode_of_payment.id')
    // ->where('clients.mode_of_payment_id','2')
    // ->get();
        
    //     return view('welcome')->with('test', $test);
    // }
    // // public function getUser($userId)
    // // {
    // //     $client = Client::find($userId);
    // //     return view('pages.associate.clients.clients_list')->with("client", $client);
    // // }
    
    // // public function showClientProfile($id)
    // // {
    // //     $client = Client::find($id);
    // //     return view('showClientProfile')->with("client", $client);
    // // }
    

    
}

