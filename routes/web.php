<?php

use Illuminate\Support\Facades\Route;

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
Route::prefix('cms/admins')->group(function () {
Route::view('/landpage', 'admin.landpage')->name('admin.landpage');
Route::view('/registerCustomer', 'admin.registerCustomer')->name('admin.register3');
Route::view('/registerDesignerAssistant', 'admin.registerDesignerAssistant')->name('admin.register2');
Route::view('/login', 'admin.auth.login')->name('admins.login');
Route::view('/registerDesigner', 'admin.registerDesigner')->name('admin.register1');});


Route::prefix('cms/admin')->middleware('auth:admin')->group(function () {
   
    //Route::view('/', 'admin.dashboard')->name('admin.dashboard');
    Route::view('/admins', 'admin.admins.index')->name('admins.index');
 
     Route::view('/appointments', 'admin.appointment-list')->name('admin.appointments');
     Route::view('/specialities', 'admin.specialities')->name('admin.specialities');
   
     Route::view('/transactions', 'admin.transactions')->name('admin.transactions');
     Route::view('/settings', 'admin.settings')->name('admin.settings');
    
     Route::view('/profile', 'admin.profile')->name('admin.profile');
    
     Route::view('/forgot-password', 'admin.forgot-password')->name('admin.forgot-password');
     Route::view('/lock-screen', 'admin.lock-screen')->name('admin.lock-screen');
 
     Route::view('/error-404', 'admin.error-404')->name('admin.error-404');
     Route::view('/error-500', 'admin.error-500')->name('admin.error-500');
 
     Route::view('/blank', 'admin.temp')->name('admin.blank');
 
     Route::view('/components', 'admin.components')->name('admin.components');
     Route::view('/tables-basic', 'admin.tables-basic')->name('admin.tables-basic');
     Route::view('/data-tables', 'admin.data-tables')->name('admin.data-tables');
    

     Route::view('/form-basic-inputs', 'admin.form-basic-inputs')->name('admin.form-basic-inputs');
     Route::view('/form-input-groups', 'admin.form-input-groups')->name('admin.form-input-groups');
     Route::view('/form-horizontal', 'admin.form-horizontal')->name('admin.form-horizontal');
     Route::view('/form-vertical', 'admin.form-vertical')->name('admin.form-vertical');
     Route::view('/form-mask', 'admin.form-mask')->name('admin.form-mask');
     Route::view('/form-validation', 'admin.form-validation')->name('admin.form-validation');

 });
 
 Route::prefix('admin')->namespace('Auth')->group(function () {
    Route::get('/login', 'AdminAuthController@showLoginView')->name('admin.login_view');
    Route::post('/login', 'AdminAuthController@login')->name('admin.login');

});

Route::prefix('admin')->middleware('auth:admin')->group(function () {

    Route::view('/', 'admin.dashboard')->name('admin.dashboard');
    Route::get('/logout','Auth\AdminAuthController@logout')->name('admin.logout');

});

 

 Route::resource('designGuests','DesignGuestController');
 Route::prefix('admin')->middleware('auth:admin')->group(function(){
    Route::resource('admins','AdminController');
    Route::resource('designers','DesignerController');
    Route::resource('shops','ShopController');
    Route::resource('customers','CustomerController');
    Route::resource('designs','DesignController'); 
    Route::resource('designer_assistants','DesignerAssistantController'); 
    Route::resource('orders','OrderController');
    Route::resource('piggybanks','PiggybankController');
    Route::resource('shows','showController');
   
});
Route::post('search','DesignController@search'); 
Route::post('search','DesignGuestController@search'); 
Route::post('storeCustomer','CustomerController@store2')->name('customers.store2');
Route::post('store2','DesignerController@store2')->name('designers.store2');
 
Route::post('storeDesignerAssistant','DesignerAssistantController@store2')->name('designer_assistants.store2');
Route::get('create2','DesignerAssistantController@create2')->name('designer_assistants.create2');
