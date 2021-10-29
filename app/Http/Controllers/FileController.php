<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\TaxFile;
use App\Models\TaxType;
use App\Models\ArchivedForm;

class FileController extends Controller
{
 
    public function index()
    {   $taxTypes =TaxType::all();
        $taxFiles=TaxFile::all();
      
        return view('welcome')->with(compact('taxTypes', $taxTypes, 'taxFiles', $taxFiles));
    }
 
   
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {   
       
        $taxFile = new TaxFile();
        $taxFile->tax_type_id =$request->taxtype;
        $taxFile->file_name =$request->filename;
        $taxFile->description= $request->description;
        $taxFile->file_type =  $request->file('upload_file')->guessExtension();
        $taxFile->save();

        return 'Successfully Uploaded';

    }

    public function show($id)
    {
        //
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
        $delete = TaxFile::find($id)->delete();
       return redirect()-> back()->with('welcome','File save to archive succesfully');
    }
   
    public function restore($id) 
    {
        $restores = TaxFile::where('id', $id)->withTrashed()->first();

        $restores->restore();

        return redirect()->route('welcome')
            ->with('restores', $restores );
    
    }
    public function getArchive() 

    {   
        $onlySoftDeleted = TaxFile::onlyTrashed()->get();
        return view('archives',compact([ 'onlySoftDeleted' ]));
    }

       //Client Tax Folders
       public function showTaxVat(){
        $vats= TaxFile::query()
        ->where('tax_type_id','1')
        ->get();
        return view('client_vat')->with('vats',$vats);
    }
    public function showTaxItr(){
        $itrs= TaxFile::query()
        ->where('tax_type_id','2')
        ->get();
        return view('client_itr')->with('itrs',$itrs);
    }
    public function showTaxPay(){
        $pays= TaxFile::query()
        ->where('tax_type_id','3')
        ->get();
        return view('client_pays')->with('pays',$pays);
    }

}
