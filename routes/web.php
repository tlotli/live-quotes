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

Route::get('/test' , function () {
   $quotes = \Illuminate\Support\Facades\DB::table('quotation_requests')
                                         ->join('quote_items' , 'quote_items.quotation_request_id' , '=' , 'quotation_requests.id')
                                         ->where('quote_items.business_profile_id' ,7)
                                         ->where('quote_items.status' , 1)
                                         ->select(\Illuminate\Support\Facades\DB::raw('SUM( quote_items.quantity * quote_items.price) * 1.15 AS total_bid_price') , 'quotation_requests.title AS bid_title')
                                         ->groupBy('quote_items.quotation_request_id' , 'quote_items.business_profile_id')
//                                         ->select(\Illuminate\Support\Facades\DB::raw('DISTINCT(quote_items.quotation_request_id) AS distinct_ids') , 'quotation_requests.title')
                                         ->get();

   dd($quotes);
});


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
Route::livewire('/view_submitted_bid/{id}' , 'submitted-bid')->name('view_submitted_bid');
Route::livewire('/preview_quote/{id}' , 'preview-quote')->name('preview_quote');
Route::livewire('/request_submissions' , 'request-submission')->name('request_submissions');
Route::livewire('/draft_incomplete' , 'open-bid-drafts')->name('draft_incomplete');
Route::livewire('/submitted_quotation_request/{id}' , 'submitted-quotation-request')->name('submitted_quotation_request');
Route::livewire('/quotation_detail/{id}/{business_profile_id}' , 'quote-detail')->name('quotation_detail');
Route::livewire('/view_bids' , 'view-bids')->name('view_bids');
Route::livewire('/companies' , 'contact-list')->name('companies');


//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
