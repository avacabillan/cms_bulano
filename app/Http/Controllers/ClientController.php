<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use DataTables;


class ClientController extends Controller
{
    public function index()
    {
        return view('pages.admin.clients.clients_list');
    }


    public function getClients(Request $request)
    {
        if ($request->ajax()) {
            $data = Client::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">View</a>
                                  <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>
                                  <a href="javascript:void(0)" class="edit btn btn-info btn-sm">Message</a>'
                                  ;
                    return $actionBtn;
                    
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function show($id)
    {
        $client = Client::find ($id); 
        return view("pages.admin.clients.client_profile")->with("client", $client);
    }

    
    public function edit($id)
    {
    
        $client = Client::find($id);
        return view("pages.admin.clients.edit_client")->with('client', $client);
    }

    
    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $client->client_name=$request ->clientname;
        $client->client_contact=$request ->contact;
        $client->TIN=$request ->tin;
        $client->OCN=$request ->ocns;
        $client->registration_date=$request ->regdate;
        $client->registration_address=$request ->regaddress;
        $client->mode_of_payment=$request ->mop;
        $client->tradename=$request ->tname;
        $client->business_line=$request ->linebus;
        $client->save();
        return redirect()->route('clients.show');
        
    }
}
