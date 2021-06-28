<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Institutions;
use App\Http\Livewire\Members;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/instituciones', Institutions::class)->name('instituciones');
    Route::get('/miembros', Members::class)->name('miembros');
    Route::get('/dashboard', function () {
        return view('dashboard');
        })->name('dashboard');
});