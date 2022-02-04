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
use App\Http\Controllers\API\ClientController;
use App\Http\Controllers\MessageController;
use App\Http\Livewire\Dropdown;
use App\Http\Controllers\MultiFileUploadController;
use App\Http\Controllers\MessagesController;

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

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
Route::get('/', function () {
    return view('auth.login');
})->middleware('login');
Route::get('/request',[RegisteredClientController:: class, 'index'])->name('requestee');
Route::get('/show-requestee',[RegisteredClientController:: class, 'requesteeDatatable'])->name('show-requestee');
Route::post('/store-requestee',[RegisteredClientController:: class, 'storeRequest'])->name('store-requestee');



// Route::get('/dashboard', function () {
//     return view('pages.admin.dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::middleware(['logout'])->group(function(){

    /*---------------------- Dashboard Stat--------------*/
    // Route::get('/dashboard', [DashboardController::class, 'getCount'])->name('dashboard');

   
     /*---------------------- EXTRA PAGES --------------*/


    Route::view('/about','pages.admin.about')->name('about');
    Route::view('/services','pages.admin.services')->name('services');
    Route::view('/guest_list','pages.admin.guest_list')->name('guest_list');
    

    /*---------------------- INTERNAL MESSAGES --------------*/

    Route::get('/admin_messages', [MessagesController::class, "adminIndex"])->name("admin_messages");
    Route::post('/admin_composemsg', [MessagesController::class, "insertAdminMsg"])->name("admin_composemsg");
    Route::post('/admin_showmsg/{id}', [MessagesController::class, "adminMessageShow"])->name("admin_showmsg");

    Route::get('/associate_messages', [MessagesController::class, "associateIndex"])->name("associate_messages");
    Route::post('/associate_composemsg', [MessagesController::class, "insertAssociateMsg"])->name("associate_composemsg");
    Route::post('/associate_showmsg/{id}', [MessagesController::class, "associateMessageShow"])->name("associate_showmsg");


     /*---------------------- MULTIFILEUPLOAD --------------*/

    Route::get('files-upload', [MultiFileUploadController::class, 'index']);
    Route::post('save-multiple-files', [MultiFileUploadController::class, 'store']);
    Route::get('/associate_messages', [MessagesController::class, "associateIndex"])->name("associate_messages");
    Route::post('/associate_composemsg', [MessagesController::class, "insertAssociateMsg"])->name("associate_composemsg");
    Route::post('/associate_showmsg', [MessagesController::class, "associateMessageShow"])->name("associate_showmsg");



    /*---------------------- ADMIN-ASSOC VIEW CRUD--------------*/
    Route::get('/assoc_table',[AdminAssocController:: class, 'index'])->name('assoc_table');
    Route::get('/associates_list',[AdminAssocController:: class, 'assocDatatable'])->name('associates_list');
    Route::get('/saveassociate',[AdminAssocController:: class, 'store'])->name('saveassociate');
    Route::get('/add_associate',[AdminAssocController:: class, 'create'])->name('add_associate');
    Route::get('/assoc-profile/{id}',[AdminAssocController:: class, 'show'])->name('assoc-profile');
    Route::get('/editassociate/{id}',[AdminAssocController:: class, 'edit'])->name('edit');
    Route::put('/updateassociate/{id}',[AdminAssocController:: class, 'update'])->name('update');
    Route::get('/delete/{id}',[AdminAssocController::class,'destroy'])->name('associate.delete');

     /*---------------------- USER REGISTRATION --------------*/


     Route::get('/request/delete/{id}',[RegisteredClientController:: class, 'delete'])->name('delete');
    // Route::get('/register-client',[RegisteredClientController:: class, 'register'])->name('subscribe');
    // Route::get('/request/edit/{id}',[RegisteredClientController:: class, 'create'])->name('role-edit');
    // Route::get('/role-update/{id}',[RegisteredClientController:: class, 'roleUpdate'])->name('role-update');
    // Route::get('/request/reject/{id}',[RegisteredClientController:: class, 'destroy'])->name('request-reject');
    // Route::get('/status-update/{id}',[RegisteredClientController:: class, 'approve'])->name('update-request');
    
    /*---------------------- CLIENTS VIEW --------------*/

    // Route::get('/dashboard',[ClientController:: class, 'index'])->name('dashboard');
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
    // Route::get('/insertClient',[Assoc_ClientController::class, 'insertClient'])->name('insertClient'); //store
    Route::get('/createClient',[Assoc_ClientController::class, 'createClient'])->name('createClient'); //create view
    Route::get('/profile/{id}', [Assoc_ClientController::class, 'showClientProfile'])->name('clientProfile'); //show
    Route::post('/deleteSelectedClient',[Assoc_ClientController::class,'deleteSelectedClient'])->name('delete.selected.client'); //destroy
    Route::get('/assoc-clients-list', [Assoc_ClientController::class, 'index'])->name('assoc-clients-list'); //index
    Route::get('/clients', [Assoc_ClientController::class, 'ajaxClient'])->name('ajax-clients'); //index

    /*---------------------- ADMIN ROUTE CLIENTS --------------*/
     Route::get('/clients-list', [Admin_ClientController::class, 'index'])->name('admin-clients-list'); //index
     Route::get('/clients_list',[Admin_ClientController:: class, 'clientDatatable'])->name('clients_list');
    Route::get('/clients-profile/{id}', [Admin_ClientController::class, 'ClientProfile'])->name('client-profile'); //index
    Route::apiResource('client', ClientController::class);

    Route::get('/api/clients', [ClientController::class, 'store'])->name('insertClient');
      //Route::get('/api/clients/{client}', [ClientController::class, 'show'])->name('client-profile');
    Route::post('/api/clients',[ClientController::class, 'edit'])->name('editClient');
    Route::put('/api/clients/{client}', [ClientController::class, 'update'])->name('updateClient');
    Route::delete('/api/clients/{client}', [ClientController::class, 'delete'])->name('delete.selected.client');
    Route::get('/archive-list', [Admin_ClientController::class,'getArchive'])->name('admin-archive-list');
    Route::get('/add_client',[Admin_ClientController:: class, 'create'])->name('add_client');
    Route::get('/insertClient',[Admin_ClientController::class, 'insertClient'])->name('insertClient'); //store

    Route::get('/clientshowTaxVat/{id}', [FileController::class,'ClientshowTaxVat'])->name('client-showVat');
    Route::get('/showVat-forms/{id}/{client}', [FileController::class,'showForm'])->name('show-forms');
    Route::get('/vatTax', [FileController::class, 'taxDatatable'])->name('vatTax');
    Route::get('/clientshowTaxItr/{id}', [FileController::class,'ClientshowTaxItr'])->name('client-showTaxItr');
    Route::get('/clientshowTaxPay/{id}', [FileController::class,'ClientshowTaxPay'])->name('client-showTaxPay');

    
    //-------------Assoc Tax Files Route---------------//

    Route::resource('upload', FileController::class);
    Route::get('/upload-file/{id}', [FileController::class,'upload'])->name('upload-file');
    Route::get('/showTaxVat/{id}', [FileController::class,'showTaxVat'])->name('showVat');
    Route::get('/showTaxItr/{id}', [FileController::class,'showTaxItr'])->name('showTaxItr');
    Route::get('/showTaxPay/{id}', [FileController::class,'showTaxPay'])->name('showTaxPay');
    Route::get('/restore-file/{id}', [FileController::class,'restore'])->name('restore-file');
    Route::get('/archive/{id}', [FileController::class,'archive'])->name('archive');
    Route::get('/archivelist', [FileController::class,'getArchive'])->name('archive-list');

     //BIRfullcalendar
    Route::get('/taxcalendar',[FullCalendarReminderController::class, 'index'])->name('bir-calendar');
    Route::get('/TaxEvent',[FullCalendarReminderController::class, 'getTaxEvent'])->name('getTaxEvent');
    Route::get('/create-reminder',[FullCalendarReminderController::class, 'createEvent'])->name('create-reminder');
    Route::get('/post-reminder',[FullCalendarReminderController::class, 'storeEvent'])->name('post-reminder');
    // Route::get('/view-reminder',[FullCalendarReminderController::class, 'viewEvent'])->name('view-reminders');
    Route::get('/edit-reminder/id={id}',[FullCalendarReminderController::class, 'editEvent'])->name('edit-reminder');
    Route::put('/update-reminder/id={id}',[FullCalendarReminderController::class, 'updateEvent'])->name('update-reminder');
    Route::get('/delete-reminder/id={id}',[FullCalendarReminderController::class, 'deleteEvent'])->name('delete-reminder');
    // Route::get('/createTaxEvent',[FullCalendarReminderController::class, 'createTaxEvent'])->name('createTaxEvent');
    
    
    //REMINDER for bulanofullcalendar
    Route::get('/bulano-calendar',[FullCalendarReminderController::class, 'indexDeadline'])->name('display-calendar');
    Route::get('/getDeadlines',[FullCalendarReminderController::class, 'getReminder'])->name('getReminder');
    Route::get('/create-deadline',[FullCalendarReminderController::class, 'createDeadline'])->name('create-deadline');
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



