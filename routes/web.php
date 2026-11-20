<?php

use App\Http\Controllers\BandController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

///////////////////////////////////
//// rotas para BandController
//////////////////////////////////
Route::get('/home', [BandController::class, 'home']);


Route::get('/bands', [BandController::class, 'index'])->name('bands.index');

// Route::get('/bands/{id}/albums', function ($id) {
//     return view('albums.index');
// });

Route::get('/bands/create', [BandController::class, 'create'])->name('bands.create');

Route::post('/bands', [BandController::class, 'store'])->name('bands.store');

Route::get('/bands/{id}/edit', [BandController::class, 'edit'])->name('bands.edit');

Route::put('/bands/{id}', [BandController::class, 'update'])->name('bands.update');

Route::delete('/bands/{id}', [BandController::class, 'destroy'])->name('bands.destroy');


// Route::get('/albums/create', function () {
//     return view('albums.create');
// });

// Route::get('/albums/{id}/edit', function ($id) {

//     $album = (object) [
//         'id' => $id,
//         'name' => 'Master of Puppets',
//         'release_date' => '1986-03-03',
//         'band_id' => 1
//     ];

//     return view('albums.edit', compact('album'));
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });
