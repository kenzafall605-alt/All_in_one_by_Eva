<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

// AUTHENTIFICATION
Route::middleware('guest')->group(function () {
    Route::get('/connexion', [LoginController::class, 'create'])
        ->name('login');

    Route::post('/connexion', [LoginController::class, 'store'])
        ->name('login.store');
});

// ESPACE UTILISATEUR PROTÉGÉ
Route::middleware(['auth', 'active'])->group(function () {

    Route::post('/deconnexion', [LoginController::class, 'destroy'])
        ->name('logout');

    Route::view('/', 'dashboard')->name('dashboard');

    // GESTION DES CLIENTS
    Route::get('/clients', [ClientController::class, 'index'])
        ->name('clients.index');

    Route::get('/clients/create', [ClientController::class, 'create'])
        ->name('clients.create');

    Route::post('/clients', [ClientController::class, 'store'])
        ->name('clients.store');

    Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])
        ->whereNumber('client')
        ->name('clients.edit');

    Route::put('/clients/{client}', [ClientController::class, 'update'])
        ->whereNumber('client')
        ->name('clients.update');

    Route::delete('/clients/{client}', [ClientController::class, 'destroy'])
        ->whereNumber('client')
        ->name('clients.destroy');

    Route::patch('/clients/{id}/restore', [ClientController::class, 'restore'])
        ->whereNumber('id')
        ->name('clients.restore');

    Route::get('/clients/{client}', [ClientController::class, 'show'])
        ->whereNumber('client')
        ->name('clients.show');

    // AUTRES MODULES
    foreach (glob(base_path('routes/modules/*.php')) as $moduleRoutes) {
        require $moduleRoutes;
    }
});
