<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Assoc_ClientController;
use App\Http\Controllers\AdminAssocController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\DemoEmailController;
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



// Route::get('clients/list', [ClientController::class, 'getClients'])->name('clients.list');


/*---------------------- ADMIN VIEW --------------*/

Route::view('/about','pages.admin.about')->name('about');
Route::view('/services','pages.admin.services')->name('services');
Route::view('/login','pages.admin.login')->name('login');
Route::view('/dashboard','pages.admin.dashboard')->name('dashboard');
Route::view('/guest_list','pages.admin.guest_list')->name('guest_list');

Route::get('/associates_list',[AdminAssocController:: class, 'index'])->name('associates_list');
// Route::view('/add_associates','pages.admin.associates.add_associates')->name('add_associates');
// Route::view('/assocprofile','pages.admin.associates.assoc_profile')->name('assocprofile');
Route::get('/insertAssociate',[AdminAssocController:: class, 'insertAssociate'])->name('insertassociate');
Route::get('/CreateNewAssociate',[AdminAssocController:: class, 'createAssociate'])->name('CreateNewAssociate');

Route::view('/calendar','pages.admin.calendar')->name('calendar');

/*---------------------- ASSOCIATES VIEW --------------*/

Route::view('/associates_login','pages.associate.associates_login')->name('associates_login');
Route::view('/assoc_dashboard','pages.associate.assoc_dashboard')->name('assoc_dashboard');
Route::view('/compose','pages.admin.messages.compose')->name('compose');


/*---------------------- CLIENTS VIEW --------------*/

Route::view('/client_login','pages.client.client_login')->name('login');
Route::view('/register','pages.admin.register')->name('register');

Route::view('/client_message','pages.client.client_message')->name('client_message');






Route::view('/associate-message','pages.associate.message')->name('associate-message'); 


// admin view and assoc view





Route::get('edit-clientForm', [Assoc_ClientController::class, 'editForm'])->name('editForm');


/*---------------------- ASSOCIATE ROUTE CLIENTS --------------*/


//  Route::resource('clients', ResourceAssoc_ClientController::class);

Route::get('edit-client/{id}', [Assoc_ClientController::class, 'editClient'])->name('editClient'); //edit
Route::post('/update/client{id}', [Assoc_ClientController::class, 'updateClient'])->name('updateClient'); //update
Route::get('/insertClient',[Assoc_ClientController::class, 'insertClient'])->name('insertClient'); //store
Route::get('/clients/list/profile/{id}', [Assoc_ClientController::class, 'showClientProfile'])->name('clientProfile'); //show
Route::post('/deleteSelectedClient',[Assoc_ClientController::class,'deleteSelectedClient'])->name('delete.selected.client'); //destroy
Route::get('/clients/list', [Assoc_ClientController::class, 'index'])->name('clients.list'); //index

//test
// Route::post('/test', [TestController::class, 'showClientProfile']);
// Route::post('/try',[TestController::class, 'trial']);