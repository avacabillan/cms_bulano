<?php

namespace App\Console\Commands;

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
       $reminders = Reminder::query()
       ->with(['client'])
       ->where('reminder_date', now()->format('Y-m-d'))
       ->where('status','pending')
       ->orderBy('tax_form_id')
       ->get();

       //group by client
       $data = [];
       foreach($reminders as $reminder){
           $data[$reminder->tax_form_id][] = $reminder->toArray();
       }

       foreach( $data as $tax_form_id=>$reminders){
           $this->sendEmailToClient($tax_form_id, $reminders);
       }
       //send email
    }
    
    private function sendEmailToUser($client_id, $reminders){
        $client = Client::find($client_id);
    }
}
