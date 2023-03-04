<?php

// public
use App\Http\Controllers\PublicController;

// user
use App\Http\Controllers\User\AuctionController as User_AuctionController;

// officer
use App\Http\Controllers\Officer\AuctionController as Officer_AuctionController;
use App\Http\Controllers\Officer\OfficerController as Officer_OfficerController;

// admin
use App\Http\Controllers\Admin\AuctionController as Admin_AuctionController;
use App\Http\Controllers\Admin\OfficerController as Admin_OfficerController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Public
// Route::get('/', function () {
//     return redirect(route('index-dcms'));
// });
Route::get('/', [PublicController::class, 'index'])->name('landing-page');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/auction', [PublicController::class, 'auction'])->name('auction');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::get('/term-of-use', [PublicController::class, 'term_of_use'])->name('term-of-use');
Route::get('/privacy-policy', [PublicController::class, 'privacy_policy'])->name('privacy-policy');

// Auth User
Auth::routes(['verify' => true]);

// OAuth Google
Route::get('/google', 'User\GoogleController@redirect');
Route::get('/callback', 'User\GoogleController@callback');

// Auth Officer
Route::name('officer.')->prefix('officer')->middleware('guest')->group(function () {
    Route::get('/login', 'Auth\OfficerLoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\OfficerLoginController@login');
    Route::post('/logout', 'Auth\OfficerLoginController@logout')->name('logout');
});

// Officer
Route::name('officer.')->prefix('officer')->middleware('auth:officer', 'verified')->group(function () {
    // Dashboard
    Route::get('/dashboard', 'Officer\OfficerController@index')->name('dashboard');
    // Lelang
    Route::get('/auction-request', 'Officer\AuctionController@index')->name('auction-request');
    Route::get('/auction-request/{id}', 'Officer\AuctionController@show')->name('auction-request.detail');
    Route::patch('/auction-request/{id}', 'Officer\AuctionController@update')->name('auction-request.update');
    // Profile
    Route::get('/profile', 'Officer\OfficerController@profile')->name('profile');
    Route::patch('/profile/{id}', 'Officer\OfficerController@profile_update');
});

// Admin
Route::name('admin.')->prefix('admin')->middleware('auth:officer', 'verified')->group(function () {
    Route::get('/dashboard', 'Admin\AdminController@index')->name('dashboard');
    // Officer
    Route::resource('officers', 'Admin\OfficerController', ['names' => ['index' => 'officers']]);
    // User
    Route::resource('users', 'Admin\UserController', ['names' => ['index' => 'users']]);
    // Lelang
    Route::resource('auctions', 'Admin\AuctionController', ['names' => ['index' => 'auctions']]);
    Route::get('/export/auctions', 'Admin\AuctionController@export')->name('export');
    // Profile
    Route::get('/profile', 'Admin\AdminController@profile')->name('profile');
    Route::patch('/profile/{id}', 'Admin\AdminController@profile_update');
});

// User
// Route::get('/user', function () {
//     return redirect(route('user.dashboard'));
// });
Route::get('/user', 'User\UserController@index');

// User
Route::name('user.')->prefix('user')->middleware('auth', 'verified')->group(function () {
    // Dashboard
    Route::get('/dashboard', 'User\UserController@index')->name('dashboard');
    // Trashed
    Route::get('/trashed', 'User\UserController@trash')->name('trashed');
    Route::get('/restore/{id}', 'User\UserController@restore')->name('restore');
    // Profile
    Route::get('/profile', 'User\UserController@profile')->name('profile');
    Route::patch('/profile/{id}', 'User\UserController@profile_update');
    // Goodies
    Route::post('/dependent-dropdown/goodies/city', 'User\GoodsController@city')->name('goodies.city');
    Route::post('/dependent-dropdown/goodies/district', 'User\GoodsController@district')->name('goodies.district');
    Route::post('/dependent-dropdown/goodies/village', 'User\GoodsController@village')->name('goodies.village');
    Route::get('/goodies/export', 'User\GoodsController@export')->name('goodies.export');
    Route::post('/goodies/export-filter', 'User\GoodsController@export_filter')->name('goodies.export_filter');
    Route::resource('goodies', 'User\GoodsController', ['names' => ['index' => 'goodies']]);
    // Auctions
    Route::get('/auctions/export', 'User\AuctionController@export')->name('auctions.export');
    Route::post('/auctions/export-filter', 'User\AuctionController@export_filter')->name('auctions.export_filter');
    Route::get('/my-auctions', 'User\AuctionController@my_auction')->name('my-auctions');
    Route::get('/auctions/{id}/detail', 'User\AuctionController@auction_detail')->name('auction-detail');
    Route::post('/auctions/{id}/follow', 'User\AuctionController@auction_follow')->name('auction-follow');
    Route::resource('auctions', 'User\AuctionController', ['names' => ['index' => 'auctions']]);
    Route::patch('/auctions/{id}/bid', 'User\AuctionController@bid')->name('auction-bid');
    // Auction Requirement
    Route::get('/auction-requirement/identity-card', 'AuctionRequirementController@identity_card')->name('identity-card');
    Route::patch('/auction-requirement/identity-card', 'AuctionRequirementController@identity_card_update');
    Route::post('/dependent-dropdown/city', 'AuctionRequirementController@city')->name('city');
    Route::post('/dependent-dropdown/district', 'AuctionRequirementController@district')->name('district');
    Route::post('/dependent-dropdown/village', 'AuctionRequirementController@village')->name('village');
    Route::get('/auction-requirement/npwp', 'AuctionRequirementController@npwp')->name('npwp');
    Route::get('/auction-requirement/bank-account', 'AuctionRequirementController@bank_account')->name('bank');
    // Auctions History
    Route::get('/auction-histories/export', 'User\AuctionHistoryController@export')->name('auction-histories.export');
    Route::post('/auction-histories/export-filter', 'User\AuctionHistoryController@export_filter')->name('auction-histories.export_filter');
    Route::resource('/auction-histories', 'User\AuctionHistoryController', ['names' => ['index' => 'auction-histories']]);
    Route::patch('/auction-histories/{id}', 'User\AuctionHistoryController@update')->name('bid');
});

// log viewer
Route::get('/log', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
