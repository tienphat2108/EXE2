<?php

use App\Http\Controllers\UserController;

Route::get('/users/sorted', [UserController::class, 'getUsersSorted']);
Route::get('/users/top7', [UserController::class, 'getSevenUsers']);
Route::get('/users/with-a', [UserController::class, 'getUsersWithA']);
Route::get('/users/start-m', [UserController::class, 'getUsersStartWithM']);
Route::get('/users/end-i', [UserController::class, 'getUsersEndWithI']);
Route::get('/users/gmail', [UserController::class, 'getUsersWithGmail']);
Route::get('/users/gmail-m', [UserController::class, 'getUsersGmailStartM']);
Route::get('/users/gmail-i', [UserController::class, 'getUsersGmailWithI']);
