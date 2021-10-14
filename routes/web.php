<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Assoc_ClientController;
use App\Http\Controllers\AdminAssocController;
// use App\Http\Controllers\ResourceAssoc_ClientController;
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
// Route::get('/CreateNewAssociate',[AdminAssocController:: class, 'createAssociate'])->name('CreateNewAssociate');
// Route::post('/associates_list/assocProfile/{userId}',[AdminAssocController:: class, 'getUser'])->name('associates_list.assocProfile');

Route::view('/calendar','pages.admin.calendar')->name('calendar');

/*---------------------- ASSOCIATES VIEW --------------*/

Route::view('/assoc_dashboard','pages.associate.assoc_dashboard')->name('assoc_dashboard');
Route::view('/compose','pages.admin.messages.compose')->name('compose');


/*---------------------- CLIENTS VIEW --------------*/

Route::view('/register','pages.admin.register')->name('register');

Route::view('/client_message','pages.client.client_message')->name('client_message');




<<<<<<< HEAD
Route::get('/clients/list', [Assoc_ClientController::class, 'index'])->name('clients.list');
// Route::get('/CreateNewClient',[Assoc_ClientController::class, 'createClient'])->name('CreateNewClient');
Route::get('/insertClient',[Assoc_ClientController::class, 'insertClient'])->name('insertClient');
Route::get('edit-clientForm', [Assoc_ClientController::class, 'editForm'])->name('editForm');
Route::get('edit-client/{id}', [Assoc_ClientController::class, 'editClient'])->name('editClient');
Route::put('update-client', [Assoc_ClientController::class, 'updateClient'])->name('updateClient');
Route::get('/clients/list/clientProfile/{id}',[Assoc_ClientController::class, 'showClientProfile'])->name('clientProfile');
Route::post('/deleteSelectedClients',[Assoc_ClientController::class,'deleteSelectedClients'])->name('delete.selected.clients');

// Route::get('/test', [TestController::class , 'showTestProfile'])->name('showClientProfile');

=======
>>>>>>> trial-v2


Route::view('/associate-message','pages.associate.message')->name('associate-message'); 


// admin view and assoc view




<<<<<<< HEAD
// test
// Route::get('/taxforms', [TestController::class , 'showTax']);
// Route::get('dropdownlist/getSubCorporate/{id}', [TestController::class , 'getSubCorporates']);

Route::get('/test/{id}', [TestController::class ,'test'])->name('test');
=======
>>>>>>> trial-v2

Route::get('edit-clientForm', [Assoc_ClientController::class, 'editForm'])->name('editForm');


/*---------------------- ASSOCIATE ROUTE CLIENTS --------------*/


//  Route::resource('clients', ResourceAssoc_ClientController::class);

Route::get('edit-client/{id}', [Assoc_ClientController::class, 'editClient'])->name('editClient'); //edit
Route::put('/update/client/{id}', [Assoc_ClientController::class, 'updateClient'])->name('updateClient'); //update
Route::get('/insertClient',[Assoc_ClientController::class, 'insertClient'])->name('insertClient'); //store
Route::get('/clients/list/profile/{id}', [Assoc_ClientController::class, 'showClientProfile'])->name('clientProfile'); //show
Route::post('/deleteSelectedClient',[Assoc_ClientController::class,'deleteSelectedClient'])->name('delete.selected.client'); //destroy
Route::get('/clients/list', [Assoc_ClientController::class, 'index'])->name('clients.list'); //index