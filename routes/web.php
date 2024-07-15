<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Register;
use App\Http\Livewire\Login;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Blogdetail;
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
    return view('home');
});

Route::get('/create', function () {
    return view('create');
});

// Route::get('/editblog/{{id}}', function () {
//     return view('editblog');
// });



// Route::get('/register', function () {
//     return view('register_user');
// });

// Route::get('/login', function () {
//     return view('login');
// });

Route::get('/blogs/{id}', Blogdetail::class)->name('blogs.show');
Route::get('/register', Register::class)->name('register');
Route::view('login','livewire.login_form')->name('login');
Route::post('/logout', [Login::class, 'logout'])->name('logout');

Route::get('/myblog', function () {
    return view('myblog');
});
Route::group(['middleware' => ['auth']], function () {
});



