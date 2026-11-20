<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

///////////////////////////////////
//// rotas temporárias
//////////////////////////////////
Route::get('/home', function () {
    return view('home');
});

Route::get('/bands', function () {
    return view('bands.index');
});

Route::get('/bands/{id}/albums', function ($id) {
    return view('albums.index');
});

Route::get('/bands/create', function () {
    return view('bands.create');
});

Route::get('/bands/{id}/edit', function ($id) {

    $band = (object) [
        'id' => $id,
        'name' => 'Metallica'
    ];

    return view('bands.edit', compact('band'));
});

Route::get('/albums/create', function () {
    return view('albums.create');
});

Route::get('/albums/{id}/edit', function ($id) {

    $album = (object) [
        'id' => $id,
        'name' => 'Master of Puppets',
        'release_date' => '1986-03-03',
        'band_id' => 1
    ];

    return view('albums.edit', compact('album'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
});
