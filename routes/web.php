<?php
include_once 'auth.php';

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.home');
});


//ADMIN ROUTES
Route::get('/admin/index', function() {
    return "ADMIN VIEW";
})->middleware('isAdmin')->name('admin.index');
