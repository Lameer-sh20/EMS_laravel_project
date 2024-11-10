<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;



// Route::get('/', function () {
//     return view('welcome');
// });

//Admin routes
Route::get('/ems', [AdminController::class, 'index'])->middleware('auth');
Route::get('/newEvent', [AdminController::class, 'new_event'])->name('new_event')->middleware('auth');
Route::post('/addEvent', [AdminController::class, 'add_event'])->name('add_event')->middleware('auth');
Route::get('/viewEvents', [AdminController::class, 'view_events'])->name('view_events')->middleware('auth');
Route::get('/editEvent', [AdminController::class, 'edit_event'])->name('edit_event')->middleware('auth');
Route::post('/updateEvent/{id}', [AdminController::class, 'update_event'])->name('update_event')->middleware('auth');
Route::get('/deleteEvent', [AdminController::class, 'delete_event'])->name('delete_event')->middleware('auth');

//customer or user routes
Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('/filter_by_category', [UserController::class, 'filter_events'])->name('filter_events');
Route::get('/event_details', [UserController::class, 'event_details'])->name('event_details');


//
Auth::routes();


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
