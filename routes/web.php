<?php

use App\Http\Controllers\contactsController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FrindsController;
use App\Http\Livewire\ChatWith;
use App\Http\Livewire\Contacts;
use App\Http\Livewire\Posts;
use Illuminate\Routing\RouteGroup;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', Contacts::class)->name('contacts');
    Route::get('/chat-with/{uuid}', ChatWith::class)->name('chat_with');
    // routes/web.php
    Route::get('pdf-preview/{file}', [FrindsController::class, 'generatePdfPreview'])->name('pdf.preview');
    Route::get('media/{id}', [FrindsController::class, 'show'])->name('pdf.show');
    Route::delete('/message/media/{id}', [FrindsController::class, 'deleteMedia'])->name('deleteMedia');
});






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
