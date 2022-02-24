<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Schedule;
use App\Models\TaxForm;

class ResetStatusAnnualy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:annual';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
         // get clients with deadline annual for reseting status purposes
         $annual =  DB::table('client_tax_forms')
         ->join('schedules', 'client_tax_forms.schedule_id', '=', 'schedules.id')
         ->join('client_taxes', 'client_tax_forms.id', '=', 'client_taxes.tax_form_id')
         ->where('schedule_id', 1)
         ->where('status',1)
         ->update(['status' => 0]);
    }
}
