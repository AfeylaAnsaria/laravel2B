<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/fitur', function () {
    return view('fitur');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/profile/edit', function () {
    return view('profile-edit');
});
Route::get('/users-view', function () {
    return view('users');
});
Route::put('/profile/update', function (Request $request) {
    session([
        'profile_name'        => $request->name,
        'profile_email'       => $request->email,
        'profile_role'        => $request->role,
        'profile_institution' => $request->institution,
        'profile_location'    => $request->location,
        'profile_bio'         => $request->bio,
    ]);

    return redirect('/profile')->with('success', 'Profil berhasil diperbarui!');
});