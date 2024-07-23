<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Register;
use App\Http\Livewire\Login;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Blogdetail;
use App\Http\Livewire\Storecsv;
use App\Http\Controllers\Auth\VerificationController;

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
    return view('components.pages.home');
});
Route::view('login','livewire.login_form')->name('login');

Route::get('/create', function () {
    return view('components.pages.create');
});

Route::get('/storecsv', function () {
    return view('components.pages.storecsv');
});


Route::get('/exportcsv', [Storecsv::class,'export']);


Route::get('/blogs/{id}',function ($id) {
    return view('components.pages.index',['id' => $id]);
})->name('blogs.show');


Route::post('/logout', function() {
    Auth::logout();
    return redirect('login');
})->name('logout');
Route::get('/myblog', function () {
    return view('components.pages.myblog');
});




Route::get('/email/verify/{user_id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::post('/email/resend', [VerificationController::class, 'resend'])
    ->middleware(['auth'])
    ->name('verification.resend');


