<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\TaxFile;
use App\Models\TaxType;
use App\Models\Client;
use App\Models\Associate;
use App\Models\Business;
use App\Models\ClientCity;
use App\Models\ClientPostal;
use App\Models\ClientProvince;
use App\Models\Corporate;
use App\Models\ModeOfPayment;
use App\Models\RegisteredAddress;
use App\Models\LocationAddress;
use App\Models\Group;
use App\Models\TaxForm;
use App\Models\ClientTax;
use App\Models\Tin;
use App\Models\Reminder;
use App\Models\ArchivedForm;
use Illuminate\Support\Facades\DB;
use DataTables;

class FileController extends Controller
{
 
    public function index($id)
   
     {  
        //   $taxTypes =TaxType::all();
    //     $taxFiles=TaxFile::all();
    //     // $client= Client::find($id);
      
    //     return view('pages.associate.clients.add_file')->with(compact('taxTypes', $taxTypes, 'taxFiles', $taxFiles));
    }
    public function VATtaxTDatatable(Request $request)
    {
        if ($request->ajax()) {
            $data = TaxFile::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    
                    $actionBtn = '<a href="#" class="edit btn btn-success btn-sm">View</a>
                        <a href="#" class="edit btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
               
                ->rawColumns(['action'])
                ->make(true);
        }
    }
 
   
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {   
       
        $taxFile = new TaxFile();
        $taxFile->tax_type_id =$request->taxtype;
        $taxFile->client_id =$request->client_id;
        $taxFile->file_name =$request->filename;
        $taxFile->description= $request->description;
        $taxFile->file_type =  $request->file('upload_file')->guessExtension();
        $taxFile->save();

      
        return redirect()->back();

    }

    public function show($id)
    {   
        $client = Client::find($id);
        $taxTypes =TaxType::all();
        $taxFiles=TaxFile::all();
        // $client= Client::find($id);
        
        return view('pages.associate.clients.add_file')->with(compact('taxTypes', $taxTypes, 'taxFiles', $taxFiles, 'client', $client));
    }

   
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
    //     $delete = TaxFile::find($id)->delete();
    //    return 'File save to archive succesfully';
    }
   
    public function restore($id) 
    {
        $restores = TaxFile::where('id', $id)->withTrashed()->first();
        $restores->restore();

        return redirect()->back();
           
    }
    public function getArchive() 

    {   
        $onlySoftDeleted = TaxFile::onlyTrashed()->get();
        return view('pages.associate.clients.archives',compact([ 'onlySoftDeleted' ]));
    }

       //Client Tax Folders
       public function showTaxVat($id){
        // $vats= TaxFile::query()
        // ->where('tax_type_id','1')
        // ->get();
        $vats = TaxFile::query()
        ->where('client_id','=', $id )
        ->where('tax_type_id','1')
        ->get();
        
        
        return view('pages.associate.clients.client_vat')->with('vats',$vats) ;
    }
    public function showTaxItr($id){
        $itrs = TaxFile::query()
        ->where('client_id','=', $id )
        ->where('tax_type_id','2')
        ->get();
        return view('pages.associate.clients.client_itr')->with('itrs',$itrs) ;
    }
    public function showTaxPay($id){
        $pays = TaxFile::query()
        ->where('client_id','=', $id )
        ->where('tax_type_id','3')
        ->get();
        return view('pages.associate.clients.client_pays')->with('pays',$pays);
    }
    public function archive($id)
    {
        $delete = TaxFile::find($id)->delete();
        return redirect()->back();
    }

    public function ClientshowTaxVat($id){
        // $vats= TaxFile::query()
        // ->where('tax_type_id','1')
        // ->get();
        // $vats = TaxFile::query()
        // ->where('client_id','=', $id )
        // ->select('tax_type_id','=',1)
        // ->get();
        
        
        return view('pages.admin.clients.client_vat')->with('vats',$vats) ;
    }
    public function ClientshowTaxItr($id){
        $itrs = TaxFile::query()
        ->where('client_id','=', $id )
        ->where('tax_type_id','2')
        ->get();
        return view('pages.admin.clients.client_itr')->with('itrs',$itrs) ;
    }
    public function ClientshowTaxPay($id){
        $pays = TaxFile::query()
        ->where('client_id','=', $id )
        ->where('tax_type_id','3')
        ->get();
        return view('pages.admin.clients.client_pays')->with('pays',$pays);
    }
    public function taxForms($id){
    
        $clientvats = Client::find($id);
        // $form = ClientTax::query()
        // ->join($clientForms, 'client_tax_forms.id', '=', $clientForms)
        //        ->where('client_tax_forms.id', '=', $clientForms)
        //         ->select('client_tax_forms.tax_form_no')
        //         ->get();
        $clientvats->clientTaxes;
       
//         $vatForm=
//         DB::table('client_tax_forms')
//         ->join($clientvats, 'client_tax_forms.id', '=', $clientvats)
//         ->where('client_tax_forms.id', '=', $clientvats)
//         ->select('client_tax_forms.tax_form_no')
//         ->get();
// dd($vatForm);
        return view('pages.admin.clients.vat_forms', compact('clientvats', $clientvats));
    }
    


}
