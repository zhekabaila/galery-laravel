<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/', App\Livewire\Home::class)->name('home');
    Route::get('/insert/foto', App\Livewire\InsertFoto::class)->name('insert.foto');
    Route::get('/insert/album', App\Livewire\InsertAlbum::class)->name('insert.album');

    Route::get('/{id}/foto', App\Livewire\DetailFoto::class)->name('detail.foto');
    Route::get('/{id}/album', App\Livewire\DetailAlbum::class)->name('detail.album');

    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');

    Route::get('/profile', App\Livewire\Profile::class)->name('profile');
});

Route::get('/login', App\Livewire\Login::class)->name('login')->middleware('guest');
Route::get('/register', App\Livewire\Register::class)->name('register')->middleware('guest');
