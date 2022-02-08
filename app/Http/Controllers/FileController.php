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
    public function taxDatatable(Request $request)
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
        $taxFile->tax_form_id =$request->taxform;
        $taxFile->client_id =$request->client_id;
        $taxFile->file_name =$request->filename;
        $taxFile->description= $request->description;
        $taxFile->file_type =  $request->file('upload_file')->guessExtension();
        $taxFile->save();


      
        return redirect()->back();

    }
    public function showForm($id, $client){
        // $fileForms = Tax::find($id);
        // $fileForms->taxFile;
        $datas = DB::table('client_tax_files')
        ->where('client_tax_files.tax_form_id', '=', $id)
        ->where('client_tax_files.client_id', '=',  $client)
        ->where('deleted_at', '=', null)
        ->get();
        // dd($datas);
        return view('pages.admin.clients.client_files',compact('datas'));
    }

    public function show($id)
    {   
        $client = Client::find($id);
        $client->clientTaxes;
        // $client= Client::find($id);
        // dd($client);
        return view('pages.associate.clients.add_file')->with(compact('client', $client));
    }

   
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
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

    public function archive($id)
    {
        $file = TaxFile::find($id);
        $file->delete();
        return redirect()->back();
    }

    


}
