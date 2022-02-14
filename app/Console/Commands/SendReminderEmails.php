<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\TaxReminder;
use App\Models\Client;
use App\Models\ClientTax;
use App\Models\Deadline;
use App\Models\Message;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Jobs\SendMailJob;
use App\Models\User;
use App\Mail\NewArrivals;

class SendReminderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to client about tax deadline';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

   
    public function handle()
    {
   
            //Get tax forms accord to deadline 
            $date =Carbon::yesterday()->format('Y-m-d'); 
            $tax_form_id = DB::table('clients')
            ->join('client_taxes', 'clients.id', '=', 'client_taxes.client_id')
            ->join('bulano_deadline', 'client_taxes.tax_form_id', '=', 'bulano_deadline.taxform_id')
            ->where('start_date', '=', $date  )
            ->select('tax_form_id')
            ->get();
           
              //Get reminder title accord to deadline 
            $reminders = DB::table('clients')
            ->join('client_taxes', 'clients.id', '=', 'client_taxes.client_id')
            ->join('bulano_deadline', 'client_taxes.tax_form_id', '=', 'bulano_deadline.taxform_id')
            ->where('start_date', '=', $date  )
            ->select('title')
            ->get();
            
              //Get clients that has  deadline accord to tax forms
            foreach($tax_form_id as $tax){
                $clients = DB::table('clients')
                ->join('client_taxes', 'clients.id', '=', 'client_taxes.client_id')
                ->where('client_taxes.tax_form_id', '=' , $tax->tax_form_id)
                ->select('email_address')
                ->get();
                dd($clients);
               
            
            }
           
            // if( $reminders != ''){
            //     Mail::to('avacabillan08@gmail.com')->send(new TaxReminder($reminders));
            // }
          
            //send emails
            if( $reminders != ''){
                foreach($clients as $client ){
                    foreach($reminders as $reminder){
                    Mail::to($client->email_address)->send(new TaxReminder($reminders, $clients));
                    
                    }
                // dd($client);
                //   dd($client->email_address);
               // dd($client->email_address,$reminder->title );
                }
                // dd($client->email_address,$reminder->title );
            }
      
    }
}