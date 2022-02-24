<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Schedule;
use App\Models\TaxForm;

class ResetDeadline extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:deadline';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset deadlines per tax forms';

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
        // $test = TaxForm::find(3);
        // $test->schedule->declaration;
        // dd($test);


        // get clients with deadline annual for reseting status purposes
        $annual =  DB::table('client_tax_forms')
        ->join('schedules', 'client_tax_forms.schedule_id', '=', 'schedules.id')
        ->join('client_taxes', 'client_tax_forms.id', '=', 'client_taxes.tax_form_id')
        ->where('schedule_id', 1)
        ->select('client_taxes.client_id','client_tax_forms.id','schedules.declaration')
        ->get();

         // get clients with deadline monthly for reseting status purposes
        $monthly =  DB::table('client_tax_forms')
        ->join('schedules', 'client_tax_forms.schedule_id', '=', 'schedules.id')
        ->join('client_taxes', 'client_tax_forms.id', '=', 'client_taxes.tax_form_id')
        ->where('schedule_id', 2)
        ->select('client_taxes.client_id','client_tax_forms.id','schedules.declaration')
        ->get();

         // get clients with deadline quarterly for reseting status purposes
        $quarterly =  DB::table('client_tax_forms')
       ->join('schedules', 'client_tax_forms.schedule_id', '=', 'schedules.id')
        ->join('client_taxes', 'client_tax_forms.id', '=', 'client_taxes.tax_form_id')
        ->where('schedule_id', 3)
        ->select('client_taxes.client_id','client_tax_forms.id','schedules.declaration')
        ->get();
         
        //dd($quarterly);



    }
}
