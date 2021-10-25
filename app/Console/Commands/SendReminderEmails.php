<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaxReminder;
use App\Models\Client;
use App\Models\ClientTax;

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
    protected $description = 'Send email notification to client about tax deadline';

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
        //get all reminders of VAT
        //    $date=date('d-m-Y', strtotime('tomorrow'));
        //    $test = DB::table('reminders')
        //     ->join('clients','reminders.client_id','=', 'clients.id')
        //     ->select('clients.email')
        //     ->where('reminders.schedule_date','=',$date)
        //     ->get();
        

        //     dd($test);
        // $reminders = Client::query()
        //     // ->with(['clients'])
        //     // ->where('reminder_date', now()->format('Y-m-d'))
        //     ->where('email', 'avacabillan08@gmail.com')
        //     // ->orderBy('client_id')
        //     ->get();
        // $clients = Client::query()
        // ->where('mode_of_payment_id','2')
        // ->select('email')
        // ->get();
        $clients = Client::all();
        // Mail::to($clients->email)->send(new TaxReminder($clients));

        foreach($clients as $client){
            Mail::send(new TaxReminder($client));
        }
        

                    // Mail::send(['html'=> 'pages.emails.reminder'],array('reminders '=>$reminders ),
                    //  function ($message) {
                    //     $message->from('test@bulano.com', 'Bulano Test');
                    //     $message->subject('Test Tax Reminder');
                    //     $message->to($reminders);
                    // });
    
        // select the clients who has tax form 1 and their email
            // $reminders = DB::table('client_taxes')
            // ->join('clients','client_taxes.client_id','=','clients.id')
            // ->select('clients.email','client_taxes.client_id')
            // ->whereIn('tax_form_id',[1])
            // ->get();
        //     // dd($reminders);

           
    //     //    // group by client
    //         $data = [];
    //         foreach($clients as $client){
    //             $data[$client->email][] = $client->toArray();
    //         }
            
    //         foreach( $data as $email=>$clients){
    //             $this->sendEmailToClient($email, $clients);
           
            
    //         }
    // //         //  dd($data);
    // //         //send email
    //  }
        
    //     private function sendEmailToUser($email, $clients){
    //         $client = Client::find($email);
           
          
    //             //  Mail::send(['html'=> 'pages.emails.reminder'],array('reminders '=>$reminders ),
    //             //  function ($message) {
    //             //     $message->from('test@bulano.com', 'Bulano Test');
    //             //     $message->subject('Test Tax Reminder');
    //             //     $message->to('ajlemluna@gmail.com')->cc('avacabillan08@gmail.com');
    //             // });


        }
}