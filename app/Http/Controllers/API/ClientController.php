<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ClientResource;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        
        $clients = Client::all();
        return response([ 'clients' => ClientResource::collection($clients), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'company_name' => 'required|max:255',
            'email_address' => 'required|max:255',
            'contact_number' => 'required',
            'ocn' => 'required|max:255',
            'assoc_id' => 'required|max:255',
            'mode_of_payment_id' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $client = Client::create($data);

        return response(['client' => new ClientResource($client), 'message' => 'Created successfully'], 201);
    }

   /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return response(['client' => new ClientResource($client), 'message' => 'Retrieved successfully'], 200);
    }

/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->update($request->all());

        return response(['client' => new ClientResource($client), 'message' => 'Update successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return response(['message' => 'Deleted']);
    }
// public function index()
// {
//     return Client::all();
// }

// public function show($id)
// {
//     return Client::find($id);
// }

// public function store(Request $request)
// {
//     return Client::create($request->all());
// }

// public function update(Request $request, $id)
// {
//     $client = Client::findOrFail($id);
//     $client->update($request->all());

//     return $client;
// }

// public function delete(Request $request, $id)
// {
//     $client = Client::findOrFail($id);
//     $client->delete();

//     return 204;
// }
 }
