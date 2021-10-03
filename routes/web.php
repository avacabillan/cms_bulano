<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Assoc_ClientController;
use App\Http\Controllers\AdminAssocController;
use App\Http\Controllers\TestController;
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

// Route::get('clients', [ClientController::class, 'index']);

// Route::get('clients/list', [ClientController::class, 'getClients'])->name('clients.list');


/*---------------------- ADMIN VIEW --------------*/

Route::view('/about','pages.admin.about')->name('about');
Route::view('/services','pages.admin.services')->name('services');
Route::view('/login','pages.admin.login')->name('login');
Route::view('/dashboard','pages.admin.dashboard')->name('dashboard');
Route::view('/guest_list','pages.admin.guest_list')->name('guest_list');

Route::view('/associates_list','pages.admin.associates.associates_list')->name('associates_list');
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

/*---------------------- ASSOCIATE ROUTE CLIENTS --------------*/



Route::get('/clients/list', [Assoc_ClientController::class, 'index'])->name('clients.list');
// Route::get('/CreateNewClient',[Assoc_ClientController::class, 'createClient'])->name('CreateNewClient');
Route::get('/insertClient',[Assoc_ClientController::class, 'insertClient'])->name('insertClient');
Route::get('/showClientProfile',[Assoc_ClientController::class, 'index'])->name('showClientProfile');
Route::get('/editclient',[Assoc_ClientController::class, 'index'])->name('editClientProfile');

Route::view('/associate-message','pages.associate.message')->name('associate-message'); 


// admin view and assoc view



Route::view('/clientprofile/viewfiles','pages.associate.clients.files_view')->name('viewfiles');

// test
// Route::get('/taxforms', [TestController::class , 'showTax']);
// Route::get('dropdownlist/getSubCorporate/{id}', [TestController::class , 'getSubCorporates']);
Route::get('/checkbox', function () {
    return view('welcome');
});



