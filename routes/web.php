<?php

use App\Http\Controllers\BandController;
use App\Http\Controllers\AlbumController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

///////////////////////////////////
//// rotas para BandController
//////////////////////////////////
Route::get('/home', [BandController::class, 'home'])->name('home');

Route::get('/bands', [BandController::class, 'index'])->name('bands.index');

Route::get('/bands/create', [BandController::class, 'create'])
->middleware('auth')
->name('bands.create');

Route::post('/bands', [BandController::class, 'store'])
->middleware('auth')
->name('bands.store');

Route::get('/bands/{id}/edit', [BandController::class, 'edit'])
->middleware('auth')
->name('bands.edit');

Route::put('/bands/{id}', [BandController::class, 'update'])
->middleware('auth')
->name('bands.update');

Route::delete('/bands/{id}', [BandController::class, 'destroy'])
->middleware('auth')
->name('bands.destroy');

//utilizando o resources para criacao automatica das rotas

Route::resource('albums', AlbumController::class)
    ->only(['create', 'store', 'edit', 'update', 'destroy'])
    ->middleware('auth');

/////////////////////////////////////////////////
///rota para a dashboard após login
/////////////////////////////////////////////////
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

//////////////////////////////////////////////////
///rota para selecionar albuns de uma banda
/////////////////////////////////////////////////
Route::get('/bands/{id}/albums', [BandController::class, 'showAlbums'])->name('bands.albums');
