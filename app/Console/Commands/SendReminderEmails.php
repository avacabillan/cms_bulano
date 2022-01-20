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
            // ------ group clients email with deadlines 
        $clients = DB::table('bulano_deadline')
            ->join('client_taxes', 'bulano_deadline.taxform_id', '=', 'client_taxes.tax_form_id')
             ->join('clients', 'client_taxes.client_id', '=', 'clients.id')
            //  ->where( 'bulano_deadline.taxform_id', '=', 1)
            ->orderBy('bulano_deadline.taxform_id')
            ->select ('bulano_deadline.taxform_id','clients.email', 'clients.id')
            ->get();
            // dd($clients);

        // ------ send emails with deadline now 
        $emails = Deadline::where('deadline', '<=', Carbon::now()->toDateTimeString())           
            ->get();
        $date =Carbon::now();
        if($emails == $date){
            foreach ($emails as $email){
                Mail::to($clients)->send(new TaxReminder($clients,$emails));
                return "Email sent";
            }
        }
          
        $users = Deadline::whereNotNull('deadline')->get();
        foreach($users as $user) {
          $diffInDays = $user->deadline->diff(Carbon::now());
      
          $user-> Mail::to($clients)->send(new TaxReminder($clients,$emails));
        }
           
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