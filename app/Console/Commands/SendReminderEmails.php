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
            }
           
        //    dd($reminders, $tax_form_id,  $clients);
    
          
         if( $reminders != ''){
             foreach($clients as $client){
                 foreach($reminders as $reminder){
                    Mail::to($client->email_address)->send(new TaxReminder($reminders, $clients));
                   
                 }
                
                //   dd($client->email_address);
             } dd($client->email_address,$reminder->title );
         }
        //  $clients = Client::all();
        //  foreach($clients as $client){
            //  dd($client->email_address);
            // Mail::to('avacabillan08@gmail.com')->send(new TaxReminder($reminders));
        //  }
    //   $users = Deadline::where('start_date','=',$date)->get();
    //   dd($users);
    //     // foreach($users as $user) {
        //   $diffInDays = $user->deadline->diff(Carbon::now());
      
        //   $user-> Mail::to($clients)->send(new TaxReminder($clients,$emails));
        // }
           
            // $dues = Deadline::whereNotNull('deadline')
            // ->get();
            // foreach($dues as $due) {
            //   $diffInDays = $due->deadline->diff(Carbon::now())->days;
          
           
          
              
            // }
        // ------ fetch deadline titles 
        //  $deadlines = DB::table('bulano_deadline')
        //  ->orderBy('taxform_id', 'asc')
        //  ->select('title')
        //  ->get();
        
           









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
        
        //  $clients =DB::table('clients')->pluck('email');
       
            // dd($clients);
        // $clients = Client::query()
        // ->where('id', '=', '3')
        // ->select('email')
        // ->get();

         // $clients =Client::find(3); to test
        // $clients = Client::query()
        // ->where('assoc_id','3')
        // ->get();

        // foreach($clients as $client){
        //     Mail::send(new TaxReminder($client));
        //     // dd($client);
        // }
        

        

        // foreach($clients as $client){
        //     Mail::send(new TaxReminder($client));
        // }
        

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


    //One hour is added to compensate for PHP being one hour faster 
        // $now = date("Y-m-d H:i", strtotime(Carbon::now()->addHour()));
        // logger($now);

        // $messages = Message::get();
        // if($messages !== null){
        //     //Get all messages that their dispatch date is due
        //     $messages->where('date_string',  $now)->each(function($message) {
        //         if($message->delivered == 'NO')
        //         {
        //             $users = User::all();
        //             foreach($users as $user) {
        //                 dispatch(new SendMailJob(
        //                     $user->email, 
        //                     new NewArrivals($user, $message))
        //                 );
        //             }
        //             $message->delivered = 'YES';
        //             $message->save();   
        //         }
        //     });
        // }
        
    }
}