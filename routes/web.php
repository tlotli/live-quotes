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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::livewire('/' , 'welcome')->name('login');
Route::livewire('/register' , 'register')->name('register');
Route::livewire('/home' , 'home')->name('home');
Route::livewire('/open_bids' , 'openbids')->name('openbids');
Route::livewire('/create_quotation' , 'quotationrequests')->name('quotationrequests');
Route::livewire('/all_quotation_requests' , 'all-quotation-requests')->name('all_quotation_requests');
Route::livewire('/update_quotation_request/{id}' , 'update-quotation-request')->name('update_quotation_request');
Route::livewire('/business_profile' , 'business-profile')->name('business_profile');
Route::livewire('/bid_detail/{id}' , 'bid-detail')->name('bid_detail');
Route::livewire('/company_profile/{id}' , 'social-page')->name('social_page');
Route::livewire('/submit_bid/{id}' , 'submit-bid')->name('submit_bid');

//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
