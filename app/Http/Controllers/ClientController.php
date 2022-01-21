<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use App\Models\TaxType;
use App\Models\TaxFile;
use App\Models\ClientTax;
use App\Models\Tin;
use App\Models\User;
use App\Models\Reminder;

class ClientController extends Controller
{
    public function index($id){
        $client = Client::find($id);
        $taxtypes = TaxType::all();
        $clientFile = DB::table('client_tax_files')
        ->join('clients', 'client_tax_files.client_id', '=', $client)
        ->join('client_tax_type', 'client_tax_files.tax_type_id', '=', 'client_tax_type.tax_type_id')
        ->select('client_tax_files.tax_type_id', 'client_tax_type.tax_type')
        ->get();
        return view('pages.client.dashboard', compact(' clientFile',  $clientFile, '    taxtypes', $taxtypes));
    }
}
