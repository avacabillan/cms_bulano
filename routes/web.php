<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Assoc_ClientController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\DemoEmailController;
use App\Http\Controllers\FullCalendarReminderController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminAssocController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin_ClientController;
use App\Http\Controllers\AdminCalendarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisteredClientController;
use App\Http\Controllers\MessageController;
use App\Http\Livewire\Dropdown;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/auth.php';

Auth::routes();

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
Route::get('/', function () {
    return view('auth.login');
})->middleware('login');

// Route::get('/dashboard', function () {
//     return view('pages.admin.dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::middleware(['logout'])->group(function(){

    


     /*---------------------- EXTRA PAGES --------------*/


    Route::view('/about','pages.admin.about')->name('about');
    Route::view('/services','pages.admin.services')->name('services');
    Route::view('/guest_list','pages.admin.guest_list')->name('guest_list');




    /*---------------------- ADMIN-ASSOC VIEW CRUD--------------*/

    Route::get('/associates_list',[AdminAssocController:: class, 'index'])->name('associates_list');
    Route::get('/add_associate',[AdminAssocController:: class, 'store'])->name('add_associate');
    Route::get('/associate-profile/{id}',[AdminAssocController:: class, 'show'])->name('assoc-profile');
    Route::get('/updateassociate',[AdminAssocController:: class, 'update'])->name('update');

     /*---------------------- USER REGISTRATION --------------*/

    Route::get('/request',[RegisteredClientController:: class, 'index'])->name('requesters');
    Route::get('/request/edit/{id}',[RegisteredClientController:: class, 'create'])->name('role-edit');
    Route::get('/role-update/{id}',[RegisteredClientController:: class, 'roleUpdate'])->name('role-update');
    Route::get('/request/reject/{id}',[RegisteredClientController:: class, 'destroy'])->name('request-reject');
    Route::get('/status-update/{id}',[RegisteredClientController:: class, 'approve'])->name('update-request');


    /*---------------------- CLIENTS VIEW --------------*/


    Route::view('/client_message','pages.client.client_message')->name('client_message');
    Route::view('/associate-message','pages.associate.message')->name('associate-message'); 
    Route::view('/client_profile','pages.client.myprofile')->name('client_profile'); 



    /*---------------------- ASSOCIATE REMINDER CLIENTS --------------*/

    //Reminders 
    Route::get('/clients/list/Reminders/{id}', [ReminderController::class, 'reminderList'])->name('clientReminder'); //showReminders
    Route::get('/createReminder', [ReminderController::class, 'reminderNew'])->name('viewReminders'); //addReminder

    /*---------------------- ASSOCIATE CRUD CLIENTS --------------*/

    Route::get('edit-client/{id}', [Assoc_ClientController::class, 'editClient'])->name('editClient'); //edit
    Route::put('/update/client/{id}', [Assoc_ClientController::class, 'updateClient'])->name('updateClient'); //update
    Route::get('/insertClient',[Assoc_ClientController::class, 'insertClient'])->name('insertClient'); //store
    Route::get('/createClient',[Assoc_ClientController::class, 'createClient'])->name('createClient'); //create view
    Route::get('/client-profile/{id}', [Assoc_ClientController::class, 'showClientProfile'])->name('clientProfile'); //show
    Route::post('/deleteSelectedClient',[Assoc_ClientController::class,'deleteSelectedClient'])->name('delete.selected.client'); //destroy
    Route::get('/assoc-clients-list', [Assoc_ClientController::class, 'index'])->name('assoc-clients-list'); //index

    /*---------------------- ADMIN ROUTE CLIENTS --------------*/
    Route::get('/clients-list', [Admin_ClientController::class, 'index'])->name('admin-clients-list'); //index
    Route::get('/clients-profile/{id}', [Admin_ClientController::class, 'ClientProfile'])->name('client-profile'); //index
    Route::get('/archive-list', [Admin_ClientController::class,'getArchive'])->name('admin-archive-list');
   
    //-------------Tax Files Route---------------//

    Route::resource('upload', FileController::class);
    Route::get('/showTaxVat/{id}', [FileController::class,'showTaxVat'])->name('showVat');
    Route::get('/showTaxItr/{id}', [FileController::class,'showTaxItr'])->name('showTaxItr');
    Route::get('/showTaxPay/{id}', [FileController::class,'showTaxPay'])->name('showTaxPay');
    Route::get('/restore-file/{id}', [FileController::class,'restore'])->name('restore-file');
    Route::get('/archive/{id}', [FileController::class,'archive'])->name('archive');
    Route::get('/archivelist', [FileController::class,'getArchive'])->name('archive-list');

     //BIRfullcalendar
    Route::get('/fullcalendar',[FullCalendarReminderController::class, 'index'])->name('fullcalendar');
    Route::get('/fullcalendar/ajax',[FullCalendarReminderController::class, 'ajax'])->name('fullcalendar.ajax');
    Route::get('/getTaxEvent',[FullCalendarReminderController::class, 'getTaxEvent'])->name('getTaxEvent');
    Route::get('/view-reminder/result',[FullCalendarReminderController::class, 'resultList'])->name('fetch_date');

    Route::get('/create-reminder',[FullCalendarReminderController::class, 'createEvent'])->name('create-reminder');
    Route::get('/post-reminder',[FullCalendarReminderController::class, 'storeEvent'])->name('post-reminder');
    Route::get('/view-reminder',[FullCalendarReminderController::class, 'viewEvent'])->name('view-reminders');
    Route::get('/edit-reminder/id={id}',[FullCalendarReminderController::class, 'editEvent'])->name('edit-reminder');
    Route::put('/update-reminder/id={id}',[FullCalendarReminderController::class, 'updateEvent'])->name('update-reminder');
    Route::get('/delete-reminder/id={id}',[FullCalendarReminderController::class, 'deleteEvent'])->name('delete-reminder');
    // Route::get('/createTaxEvent',[FullCalendarReminderController::class, 'createTaxEvent'])->name('createTaxEvent');
    
    
    //REMINDER for bulanofullcalendar
    Route::get('/display-deadline',[FullCalendarReminderController::class, 'indexDeadline'])->name('display-calendar');
    Route::get('/ajax-deadline',[FullCalendarReminderController::class, 'deadlineAjax'])->name('ajax-calendar');
    Route::get('/create-deadline',[FullCalendarReminderController::class, 'createDeadline'])->name('create-deadline');
    Route::get('/list-deadline',[FullCalendarReminderController::class, 'listDeadline'])->name('list-deadline');
    Route::get('/store-deadline',[FullCalendarReminderController::class, 'storeDeadline'])->name('store-deadline');
    Route::get('/edit-deadline/{id}',[FullCalendarReminderController::class, 'editDeadline'])->name('edit-deadline');
    Route::put('/update-deadline/{id}',[FullCalendarReminderController::class, 'updateDeadline'])->name('update-deadline');
    Route::get('/delete-deadline/{id}',[FullCalendarReminderController::class, 'deleteDeadline'])->name('delete-deadline');

       
    


   

});
// Route::get('/try',[TestController::class, 'trial']);
//fullcalender

 //testing routes   
Route::get('testfullcalendar',[AdminCalendarController::class, 'index'])->name('try-calendar');
Route::post('fullcalendar/create',[AdminCalendarController::class, 'create'])->name('try-create');
Route::post('fullcalendar/update',[AdminCalendarController::class, 'update']) ->name('try-update');
Route::post('fullcalendar/delete',[AdminCalendarController::class, 'destroy']) ->name('try-destroy');





Route::get('/getusers', [MessageController::class, 'getUsers'])->name('getUsers');
Route::get('/get_messages',  [MessageController::class, 'getMessages'])->name('getMessages');
Route::post('notifications',  [MessageController::class, 'sendMail'])->name('sendMail');
    //try
    Route::view('/duedate','pages.associate.duedateform')->name('duedate'); 



