<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\UserComponent;
use App\Livewire\Client;
use App\Livewire\Brand;
use App\Livewire\RecentOrder;
use App\Livewire\NewUser;
use App\Http\Controllers\HomeController;

// Route::view('/', 'welcome');

// Route::get('/', 'HomeController@index');
Route::get('/', [HomeController::class, 'index']);
Route::get('/dashboard', [HomeController::class, 'dashboard']);

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/recent-orders', RecentOrder::class);
Route::get('/users', UserComponent::class);
Route::get('/new-user', NewUser::class);
Route::get('/clients', Client::class);
Route::get('/brands', Brand::class);


require __DIR__.'/auth.php';
