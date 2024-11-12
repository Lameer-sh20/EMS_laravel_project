<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;


//Admin routes
Route::get('/emsAdmin', [AdminController::class, 'index'])->middleware('auth');
Route::get('/newEvent', [AdminController::class, 'new_event'])->name('new_event')->middleware('auth');
Route::post('/addEvent', [AdminController::class, 'add_event'])->name('add_event')->middleware('auth');
Route::get('/viewEvents', [AdminController::class, 'view_events'])->name('view_events')->middleware('auth');
Route::get('/editEvent', [AdminController::class, 'edit_event'])->name('edit_event')->middleware('auth');
Route::post('/updateEvent/{id}', [AdminController::class, 'update_event'])->name('update_event')->middleware('auth');
Route::get('/deleteEvent', [AdminController::class, 'delete_event'])->name('delete_event');

//customer/user or routes
Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/filter_by_category', [UserController::class, 'filter_events'])->name('filter_events');
Route::get('/event_details', [UserController::class, 'event_details'])->name('event_details');
Route::post('/bookEvent', [UserController::class, 'book_event'])->name('book_event');


// authentication
Auth::routes();

