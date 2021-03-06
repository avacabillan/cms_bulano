<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\ModeOfPayment;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   view()->composer(['pages.admin.sidebar','pages.admin.dashboard', 'admin-clients-list',
                          'clients-list','show-requestee', 'auth.register',
                          'bir-calendar','display-calendar',
                          'assoc_table','archive-list'],function($view){

                            $reqs= DB::table('requestee')->where('status', 0)
                            ->where('deleted_at', null)
                            ->count();
                            $birs= DB::table('reminders')
                            ->count();
                            $ddlines= DB::table('bulano_deadline')
                            ->count() +$birs;
                            $admins= DB::table('users')->where('role', 'admin')
                            ->get();
                           
                            $assocs= DB::table('associates')
                            ->count();
                            $clients= DB::table('clients')
                            ->count();
                            $archives= DB::table('client_tax_files')
                            ->where('deleted_at', '!=', null)
                            ->count();
                            $modes= ModeOfPayment::all();
                            $view->with('reqs',$reqs)
                                 ->with('birs',$birs)
                                 ->with('ddlines',$ddlines)
                                 ->with('assocs',$assocs)
                                 ->with('clients',$clients)
                                 ->with('archives',$archives)
                                 ->with('admins',$admins)
                                 ->with('modes',$modes);
                               
                        });

        Schema::defaultstringLength(191);
    }
}
