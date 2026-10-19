
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AuthController;

// Homepage
// Logged-out visitors go to Login.
// Authenticated users can access the homepage.
Route::get('/', function () {
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    return view('home');
})->name('home');

// Existing portfolio routes
Route::get('/portfolios', [PortfolioController::class, 'index'])
    ->middleware('auth')
    ->name('portfolio.index');

Route::get('/portfolio/create', [PortfolioController::class, 'create'])
    ->middleware('auth')
    ->name('portfolio.create');

Route::get('/portfolio-preview/{template}', [
    PortfolioController::class,
    'preview'
])->middleware('auth')->name('portfolio.preview');

Route::post('/portfolio', [PortfolioController::class, 'store'])
    ->middleware('auth')
    ->name('portfolio.store');

Route::get('/portfolio/{portfolio}', [
    PortfolioController::class,
    'show'
])->middleware('auth')->name('portfolio.show');

Route::get('/portfolio/{portfolio}/edit', [
    PortfolioController::class,
    'edit'
])->middleware('auth')->name('portfolio.edit');

Route::put('/portfolio/{portfolio}', [
    PortfolioController::class,
    'update'
])->middleware('auth')->name('portfolio.update');

Route::delete('/portfolio/{portfolio}', [
    PortfolioController::class,
    'destroy'
])->middleware('auth')->name('portfolio.destroy');

// Registration
Route::get('/register', [AuthController::class, 'showRegister'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->middleware(['guest', 'throttle:5,1'])
    ->name('register.store');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->middleware(['guest', 'throttle:5,1'])
    ->name('login.store');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
