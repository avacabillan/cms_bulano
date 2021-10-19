<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\DB;
use Mail; 
use App\Models\Client;
use Illuminate\Console\Command;

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

    /**
     * Execute the console command.
     *
     * @return int
     */
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


        // select the clients who has tax form 1 and their email
        //     $reminders = DB::table('client_taxes')
        //     ->join('clients','client_taxes.client_id','=','clients.id')
        //     ->select('clients.email','client_taxes.client_id')
        //     ->whereIn('tax_form_id',[1])
        //     ->get();
        //     // dd($reminders);

           
        //    // group by client
        //     $data = [];
        //     foreach($reminders as $reminder){
        //         $data[$reminder->client_id][] = $reminder->toArray();
        //     }
            
        //     foreach( $data as $client_id=>$reminders){
        //         $this->sendEmailToClient($client_id, $reminders);

        //     }
        //      dd($data);
        //     //send email
        //     }
        
        //  private function sendEmailToUser($client_id, $reminders){
        //     $client = Client::find($client_id);

        //     Mail::to($client())->send(new TaxReminder ($reminders));

        // Mail::send(['html'=> 'pages.emails.reminder'],array('test'=>$test),
        //  function ($message) {
        //     $message->from('test@bulano.com', 'Bulano Test');
        //     $message->subject('Test Tax Reminder');
        //     $message->to('ajlemluna@gmail.com')->cc('avacabillan08@gmail.com');
        // });


    }
}