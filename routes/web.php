<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Assoc_ClientController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\DemoEmailController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminAssocController;
use App\Http\Controllers\RegisteredClientController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('pages.admin.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

// Route::get('/register', [App\Http\Controllers\HomeController::class, 'register'])->name('register');
// Route::get('/home', [LoginController::class, 'login'])->name('login');



// Route::get('clients/list', [ClientController::class, 'getClients'])->name('clients.list');
/*---------------------- ADMIN VIEW --------------*/
// Route::get('/request', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/status/{id}', [App\Http\Controllers\HomeController::class, 'status'])->name('status');

Route::view('/about','pages.admin.about')->name('about');
Route::view('/services','pages.admin.services')->name('services');
// Route::view('/login','pages.admin.login')->name('login');
Route::view('/dashboard','pages.admin.dashboard')->name('dashboard');
Route::view('/guest_list','pages.admin.guest_list')->name('guest_list');

/*---------------------- ADMIN-ASSOC VIEW --------------*/


// Route::resource('associate', AdminAssocController::class);

Route::get('/associates_list',[AdminAssocController:: class, 'index'])->name('associates_list');
Route::get('/add_associate',[AdminAssocController:: class, 'store'])->name('add_associate');
Route::get('/associate/Profile/{id}',[AdminAssocController:: class, 'show'])->name('assoc_profile');
Route::get('/updateassociate',[AdminAssocController:: class, 'update'])->name('update');

// Registration routes
// Route::get('/register',[RegisteredClientController:: class, 'register'])->name('register');
Route::get('/storeRequest',[RegisteredClientController:: class, 'store'])->name('storeRequest');
Route::get('/request',[RegisteredClientController:: class, 'index'])->name('requesters');
Route::get('/request/edit{id}',[RegisteredClientController:: class, 'edit'])->name('request-edit');
Route::get('/status-update/{id}',[RegisteredClientController:: class, 'update'])->name('status-update');



/*---------------------- ASSOCIATES VIEW --------------*/

Route::view('/associates_login','pages.associate.associates_login')->name('associates_login');
Route::view('/assoc_dashboard','pages.associate.assoc_dashboard')->name('assoc_dashboard');
Route::view('/compose','pages.admin.messages.compose')->name('compose');


/*---------------------- CLIENTS VIEW --------------*/

// Route::view('/client_login','pages.client.client_login')->name('login');
// Route::view('/register','pages.admin.register')->name('register');

Route::view('/client_message','pages.client.client_message')->name('client_message');






Route::view('/associate-message','pages.associate.message')->name('associate-message'); 


// admin view and assoc view





Route::get('edit-clientForm', [Assoc_ClientController::class, 'editForm'])->name('editForm');


/*---------------------- ASSOCIATE ROUTE CLIENTS --------------*/


//  Route::resource('clients', ResourceAssoc_ClientController::class);
//Reminders 
Route::get('/clients/list/Reminders/{id}', [ReminderController::class, 'reminderList'])->name('clientReminder'); //showReminders
Route::get('/createReminder', [ReminderController::class, 'reminderNew'])->name('viewReminders'); //addReminder

Route::get('edit-client/{id}', [Assoc_ClientController::class, 'editClient'])->name('editClient'); //edit
Route::put('/update/client/{id}', [Assoc_ClientController::class, 'updateClient'])->name('updateClient'); //update
Route::get('/insertClient',[Assoc_ClientController::class, 'insertClient'])->name('insertClient'); //store
Route::get('/clients/list/profile/{id}', [Assoc_ClientController::class, 'showClientProfile'])->name('clientProfile'); //show
Route::post('/deleteSelectedClient',[Assoc_ClientController::class,'deleteSelectedClient'])->name('delete.selected.client'); //destroy
Route::get('/clients/list', [Assoc_ClientController::class, 'index'])->name('clients.list'); //index

//test
// Route::post('/test', [TestController::class, 'showClientProfile']);
Route::get('/try',[TestController::class, 'trial']);

//-------------Tax Files Route---------------
Route::resource('upload', FileController::class);
Route::get('/showTaxVat/{id}', [FileController::class,'showTaxVat'])->name('showVat');
Route::get('/showTaxItr/{id}', [FileController::class,'showTaxItr'])->name('showTaxItr');
Route::get('/showTaxPay/{id}', [FileController::class,'showTaxPay'])->name('showTaxPay');
Route::get('/restore/{id}', [FileController::class,'restore'])->name('restore');
Route::get('/archive/{id}', [FileController::class,'archive'])->name('archive');
Route::get('/archivelist', [FileController::class,'getArchive'])->name('archive-list');
