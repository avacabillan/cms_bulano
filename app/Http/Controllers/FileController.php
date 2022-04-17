<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
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
use Illuminate\Support\Facades\Auth;
use DataTables;

class FileController extends Controller
{
 
    public function index($id)
   
     {  
        
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

  //Assoc upload controls
    public function store(Request $request)
    {   
       
        $taxFile = new TaxFile();
        $taxFile->tax_form_id =$request->taxform;
        $taxFile->client_id =$request->client_id;
        $taxFile->file_name =$request->filename;
        $taxFile->description= $request->description;
        $taxFile->file_type =  $request->file('file')->guessExtension(); 

        if ($request->hasfile('file'))
        {
            $request->validate([
                'file' => 'required|mimes:image,jpg,png,jpeg,gif,svg,pdf|max:2048',
            ]);
            
            $file = $request->file('file');
            $size = $request->file('file')->getSize();
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = $request->name.'filename'. $extension;
            $file->move('public/files/pdfs', $filename); 
            $taxFile ->file = $filename;
        } 
        $taxFile->save();


      
        return redirect()->back();

    }
    public function view($id)
    {
        $file = TaxFile::find($id);
 
        return view('pages.associate.clients.viewfile',compact('file'));
 
 
    }
 

    public function show($id)
    {   
        $client = Client::find($id);
        $client->clientTaxes;
        // $client= Client::find($id);
        // dd($client);
        return view('pages.associate.clients.add_file')->with(compact('client', $client));
    }
    public function viewForm($id, $client){
        // $fileForms = Tax::find($id);
        // $fileForms->taxFile;
        $datas = DB::table('client_tax_files')
        ->where('client_tax_files.tax_form_id', '=', $id)
        ->where('client_tax_files.client_id', '=',  $client)
        ->where('deleted_at', '=', null)
        ->get();
        // dd($datas);
        return view('pages.associate.clients.client_files',compact('datas'));
    }
    public function getArchives() 
    {   
        
 
        $associate = Auth::user()->associates->id;
        $clients = Client::query()
        ->where('assoc_id', '=', $associate )
        ->pluck('id');
        $onlySoftDeleted = TaxFile::where('client_id', '=', $clients)
        ->onlyTrashed();
        //dd($onlySoftDeleted);
        return view('pages.associate.clients.archives',compact('onlySoftDeleted' ));
    }
   
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
//---------end of assoc upload controls

   
//------ADMIN ARCHIVE CONTROLS
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
   
    public function restore($id) 
    {
        $restores = TaxFile::where('id', $id)->withTrashed()->first();
        $restores->restore();
        Alert::success('Success', 'File Successfuly Restored!');
        return redirect()->back();
           
    }
    public function getArchive() 

    {   
        $onlySoftDeleted = TaxFile::onlyTrashed()->get();
        return view('pages.admin.clients.archives',compact([ 'onlySoftDeleted' ]));
    }

    public function archive($id)
    {
        $file = TaxFile::find($id);
        $file->delete();
        Alert::success('Success', 'File Successfuly Arhcived!');
        return redirect()->back();
    }

    


}
