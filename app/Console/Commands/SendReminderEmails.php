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
            $date =Carbon::now()->format('Y-m-d'); 
            $tax_form_id = DB::table('clients')
            ->join('client_taxes', 'clients.id', '=', 'client_taxes.client_id')
            ->join('bulano_deadline', 'client_taxes.tax_form_id', '=', 'bulano_deadline.taxform_id')
            ->where('start_date', '=', $date  )
            ->select('tax_form_id')
            ->get();
        //    dd($date);
              //Get reminder title accord to deadline 
            $reminders = DB::table('clients')
            ->join('client_taxes', 'clients.id', '=', 'client_taxes.client_id')
            ->join('bulano_deadline', 'client_taxes.tax_form_id', '=', 'bulano_deadline.taxform_id')
            ->where('start_date', '=', $date  )
            ->distinct()->get('title');
            // dd($reminders);
              //Get clients that has  deadline accord to tax forms
            foreach($tax_form_id as $tax){
                $clients = DB::table('clients')
                ->join('client_taxes', 'clients.id', '=', 'client_taxes.client_id')
                ->where('client_taxes.tax_form_id', '=' , $tax->tax_form_id)
                
                ->pluck('email_address');
               
            }  
            // dd($clients);
            // if( $reminders != ''){
            //     Mail::to('avacabillan08@gmail.com')->send(new TaxReminder($reminders));
            // }
       
            //dd($clients);  
            //send emails (good but repeating emails)
            
           
                   
               
                  // dd($client->email_address);
                //dd($client->email_address,$reminder->title );
               
                // dd($client->email_address,$reminder->title );
                $reminds =explode(',',$reminders);
                //dd($reminds);
                if( $reminds != ''){
                    foreach($clients as $client){
                         Mail::to($client)->send(new TaxReminder($reminds, [$client]));
                    }
                    // dd($reminds->title);
                }
           
           
           

                //  var_dump( Mail:: failures());
                //  exit; 












                // $emails =explode (',',$clients);
                 
                    // return '$client';
                    //  Mail::send(new TaxReminder($reminder, $client), [], function($message) use ( $client)
                    // {    
                    //     $message->to( $client);    
                        
                    // });
                    // foreach (['avacabillan08@gmail.com'] as $client) {
                    //     Mail::to($client)->send(new TaxReminder($reminder, $client));
                    //     //dd($client);
                    // }
                    //Mail::to($client)->send(new TaxReminder($reminder, [$client]));
                   
                         
               
               

            // foreach($reminders as $reminder){
            //     $emails =explode (',',$clients);
            //     //dd( $emails );
            //     if( $reminder != ''){
            //         // Mail::to( $emails)->send(new TaxReminder($reminder));
            //         // dd($clients);
            //         Mail::send(new TaxReminder($reminder), [], function($message) use ($emails)
            //         {    
            //             $message->to($emails['email_address']);    

            //         });
            //       
            //     }
               
            //     }
            
            // //send emails

            // // foreach($reminders as $reminder){
            // // if( $reminder != ''){
               
            // //        // dd($client);
                    
            // //             // Mail::send(new TaxReminder($reminder, [$clients]));
            // //             // foreach ([$clients] as $recipient) {
            // //             //     Mail::to($recipient)->send(new TaxReminder($reminder, [$clients]));
            // //             // }
                   
            // //         $emails =explode (',',$clients);
            // //          // dd( $emails);
            // //         Mail::send(new TaxReminder($reminder, $emails), [], function($message) use ($emails)
            // //         {    
            // //             $message->to($emails);    

            // //         });
                    
                     


    }
}