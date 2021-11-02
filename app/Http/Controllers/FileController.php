<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\TaxFile;
use App\Models\TaxType;
use App\Models\Client;
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

        return redirect()->route('pages.associate.clients.clients_list')
            ->with('restores', $restores );
    
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
       return 'File save to archive succesfully';
    }


}
