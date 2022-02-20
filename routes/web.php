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
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MessageController;
use App\Http\Livewire\Dropdown;
use App\Http\Controllers\MultiFileUploadController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\TaxFormsController;


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
Route::post('/store-requestee',[RegisteredClientController:: class, 'storeRequest'])->name('store-requestee');
// Route::view('requirements', 'read')->name('read');


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




    //Route::view('/taxforms',['pages.admin.taxforms'])->name('taxforms'); //taxforms
     Route::get('/addtaxforms',[TaxFormsController::class, 'addforms'])->name('addtaxforms'); 
     Route::get('/taxforms',[TaxFormsController::class, 'index'])->name('taxforms'); 
   

   
     /*---------------------- EXTRA PAGES --------------*/

    Route::view('/about','pages.admin.about')->name('about');
    Route::view('/services','pages.admin.services')->name('services');
    Route::view('/guest_list','pages.admin.guest_list')->name('guest_list');
    

    /*---------------------- INTERNAL MESSAGES --------------*/


    Route::get('/associate_messages', [MessagesController::class, "associateIndex"])->name("associate_messages");
    Route::post('/associate_composemsg', [MessagesController::class, "insertAssociateMsg"])->name("associate_composemsg");
    Route::post('/associate_showmsg/{id}', [MessagesController::class, "associateMessageShow"])->name("associate_showmsg");
    Route::post('/associate_reply', [MessagesController::class, "replyAssociate"])->name("associate_reply");
    
    Route::get('/client_message', [MessagesController::class, "clientIndex"])->name("client_message");
    Route::post('/client_composemsg', [MessagesController::class, "insertClientMsg"])->name("client_composemsg");
    Route::post('/client_showmsg/{id}', [MessagesController::class, "clientMessageShow"])->name("client_showmsg");
    Route::post('/client_reply', [MessagesController::class, "replyClient"])->name("client_reply");

     /*---------------------- MULTIFILEUPLOAD --------------*/

    Route::get('files-upload', [MultiFileUploadController::class, 'index']);
    Route::post('save-multiple-files', [MultiFileUploadController::class, 'store']);
    Route::get('/associate_messages', [MessagesController::class, "associateIndex"])->name("associate_messages");
    Route::post('/associate_composemsg', [MessagesController::class, "insertAssociateMsg"])->name("associate_composemsg");
    Route::post('/associate_showmsg', [MessagesController::class, "associateMessageShow"])->name("associate_showmsg");



    /*---------------------- ADMIN-ASSOC VIEW CRUD--------------*/
    Route::get('/associates',[AdminAssocController:: class, 'index'])->name('assoc_table');
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
    Route::view('/associate-message','pages.associate.message')->name('associate-message'); 
    Route::get('/my_profile/{id}', [ClientController::class,'showProfile'])->name('client_profile');
    Route::get('/my_associate',[ClientController::class,'showAssoc'])->name('my_associate');
    Route::get('/form/{id}/{client}', [ClientController::class,'showForm'])->name('view-form');



  

    /*---------------------- ASSOCIATE CRUD CLIENTS --------------*/

    Route::get('edit-client/{id}', [Assoc_ClientController::class, 'editClient'])->name('editClient'); //edit
    Route::put('/update/client/{id}', [Assoc_ClientController::class, 'updateClient'])->name('updateClient'); //update
    // Route::get('/insertClient',[Assoc_ClientController::class, 'insertClient'])->name('insertClient'); //store
    Route::get('/createClient',[Assoc_ClientController::class, 'createClient'])->name('createClient'); //create view
    Route::get('/profile/{id}', [Assoc_ClientController::class, 'showClientProfile'])->name('clientProfile'); //show
    Route::post('/deleteSelectedClient',[Assoc_ClientController::class,'deleteSelectedClient'])->name('delete.selected.client'); //destroy
    Route::get('/assoc-clients-list', [Assoc_ClientController::class, 'index'])->name('assoc-clients-list'); //index
    Route::get('/clients', [Assoc_ClientController::class, 'ajaxClient'])->name('ajax-clients'); //index
    Route::get('qrcode/{id}', [Assoc_ClientController::class, 'generate'])->name('generate');
      
    //-------------Assoc Tax Files Route---------------//
    
    Route::resource('upload', FileController::class);
    Route::get('/view-form/{id}/{client}', [FileController::class,'viewForm'])->name('preview-forms');
    Route::get('/archives-list', [FileController::class,'getArchives'])->name('assoc-archive-list');
    Route::get('/view/{id}',[FileController::class,'view'])->name('view'); 
    /*---------------------- ADMIN ROUTE CLIENTS --------------*/
    Route::get('/assoc-clients', [Admin_ClientController::class, 'getclients'])->name('admin.getclients'); //index
    Route::get('/transfer-clients', [Admin_ClientController::class, 'transferclient'])->name('admin.transfer'); //index
     Route::get('/clients-list', [Admin_ClientController::class, 'index'])->name('admin-clients-list'); //index
     Route::get('/ajax/clients_list',[Admin_ClientController:: class, 'clientDatatable'])->name('ajax_clients_list');
    Route::get('/clients-profile/{id}', [Admin_ClientController::class, 'ClientProfile'])->name('client-profile'); //index

    Route::get('/add_new_client/requestee/{id}',[Admin_ClientController:: class, 'create'])->name('add_client');
    Route::get('/insertClient/{id}',[Admin_ClientController::class, 'insertClient'])->name('insertClient'); //store
    Route::get('/archive-list', [FileController::class,'getArchive'])->name('admin-archive-list');
    Route::get('/restore-file/{id}', [FileController::class,'restore'])->name('restore-file');
    Route::get('/archive/{id}', [FileController::class,'archive'])->name('archive');
    Route::get('/forms/{id}/{client}', [FileController::class,'showForm'])->name('show-forms');
  

  


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
    Route::get('/result',[FullCalendarReminderController::class, 'resultList'])->name('fetch_date');
    
    //REMINDER for bulanofullcalendar
    Route::get('/bulano-calendar',[FullCalendarReminderController::class, 'indexDeadline'])->name('display-calendar');
    Route::get('/getDeadlines',[FullCalendarReminderController::class, 'getReminder'])->name('getReminder');
    Route::get('/create-deadline',[FullCalendarReminderController::class, 'createDeadline'])->name('create-deadline');
    Route::get('/store-deadline',[FullCalendarReminderController::class, 'storeDeadline'])->name('store-deadline');
    Route::get('/edit-deadline/{id}',[FullCalendarReminderController::class, 'editDeadline'])->name('edit-deadline');
    Route::put('/update-deadline/{id}',[FullCalendarReminderController::class, 'updateDeadline'])->name('update-deadline');
    Route::get('/delete-deadline/{id}',[FullCalendarReminderController::class, 'deleteDeadline'])->name('delete-deadline');

       
    


   

});
 Route::view('/try','test');
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



