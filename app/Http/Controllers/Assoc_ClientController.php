<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Associate;
use App\Models\TaxForm;
use App\Models\ClientTax;
use \Yajra\Datatables\Datatables;
use Carbon\Carbon;
class Assoc_ClientController extends Controller
{
    
    public function index (Request $request) {
                        
     
            
            return view ('pages.associate.clients.clients_list');
            
    }
    public function assocMarkNotification(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }
    public function ajaxClient(Request $request){
        if ($request->ajax()) {
            $data = Associate::with('client');
            return Datatables::eloquent($data)
                ->addColumn('client', function (Associate $assoc) {
                    return $assoc->client->company_name;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('client-profile',$row->id).'" class="edit btn btn-success btn-sm">View</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action','clients'])
                ->make(true);
        }
        
    }

    public function showClientProfile($id){
        
        $client = Client::find($id);
        $client->modeofpayment;
                $client->tin;
                $client->business;
                $client->registeredAddress;
                $client->associates;
                $client->clientTaxes;
                $client->taxFile;
        return view('pages.associate.clients.client_profiles',compact('client',$client));
     
    }
   

   
    public function deleteSelectedClients(Request $request){

        $client_ids = $request->clients_ids;
        Client::whereIn('id', $client_ids)->delete();
        return response()->json(['code'=>1, 'msg'=>'Countries have been deleted from database']); 
    
    } 
    
    public function editClient($id)
    {
        $taxForms= TaxForm::all();
        $client = Client::find($id);
        $client->modeofpayment;
        $client->tin;
        $client->business;
        $client->registeredAddress;
        $client->clientTaxes;
        return view('pages.associate.clients.edit_client',compact('client', 'taxForms', $taxForms)); 
  

    }
    public function updateClient(Request $request, $id)
    {   
        $client =Client::find($id);
        $client ->company_name = $request->client_name;
        $client ->email_address = $request->email;
        $client ->contact_number = $request->client_contact;
        $client->save();

        $business =Client::find($id)->business->first();
        $business->trade_name =$request->trade_name;
        $business->registration_date =$request->reg_date;
        $business->save();

        $tin =Client::find($id)->tin->first();
        $tin->tin_no =$request->tin;
        $tin->save();
        
        $address =Client::find($id)->registeredAddress->first();
        $address->unit_house_no =$request->unit_house_no;
        $address->street =$request->street;
        $address->city_name =$request->client_city;
        $address->province_name =$request->client_province;
        $address->postal_no =$request->client_postal;
        $address->save();
  
        return redirect()->route('dashboard')->with('message', 'Updated Successfully!');
    }

    public function clientDeadline($id)
    {
        
        $date =Carbon::now()->format('Y-m-d'); 

        $reminders = DB::table('client_taxes')
        ->join('clients','client_taxes.client_id' , '=','clients.id' )
        ->join('bulano_deadline', 'client_taxes.tax_form_id', '=', 'bulano_deadline.taxform_id')
        ->join('client_tax_forms', 'client_taxes.tax_form_id', '=', 'client_tax_forms.id')
        ->where('start_date', '=', $date  )
        ->where('clients.id', '=',$id)
       // ->where('client_taxes.status', 0)
        ->select('title', 'start_date','client_tax_forms.tax_form_no', 'client_taxes.status','client_taxes.id')
        ->get();
        return view('pages.associate.clients.deadlines',compact('reminders'));
    }
    public function changeStatus( $id)
    {
        $clientTax = ClientTax::find($id);
        
        if( $clientTax->status==False){
            $clientTax->status=1;
        }else{
            $clientTax->status=0;
        }
        $clientTax->save();
        
        return redirect()->back();
    }
    public function declarationAttach(Request $request,$id){
        
        $clientTax = ClientTax::find($id);
        $clientTax->file =  $request->file('file')->guessExtension(); 
        
        if ($request->hasfile('file'))
        {
            $request->validate([
                'file' => 'required|mimes:pdf|max:2048',
            ]); 
            
            $file = $request->file('file');
            $size = $request->file('file')->getSize();
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = $request->name.'filename'. $extension;
            $file->move('public/files/computedfile', $filename); 
            $clientTax ->file = $filename;
        } 
        $clientTax->save();
         return redirect()->back(); 
    }




}
