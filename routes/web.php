<?php

use Illuminate\Support\Facades\Route;

// Route provisoire : sera protégée par l'authentification dans feature/auth-roles
Route::view('/', 'dashboard')->name('dashboard');