<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

Route::get('/', function () {
    return view('home');
});

Route::get('/portfolios', [PortfolioController::class, 'index'])
    ->name('portfolio.index');

Route::get('/portfolio/create', [PortfolioController::class, 'create'])
    ->name('portfolio.create');

// Live preview using the selected existing template.
Route::get('/portfolio-preview/{template}', [
    PortfolioController::class,
    'preview'
])->name('portfolio.preview');

Route::post('/portfolio', [PortfolioController::class, 'store'])
    ->name('portfolio.store');

Route::get('/portfolio/{portfolio}', [PortfolioController::class, 'show'])
    ->name('portfolio.show');

Route::get('/portfolio/{portfolio}/edit', [PortfolioController::class, 'edit'])
    ->name('portfolio.edit');

Route::put('/portfolio/{portfolio}', [PortfolioController::class, 'update'])
    ->name('portfolio.update');

Route::delete('/portfolio/{portfolio}', [PortfolioController::class, 'destroy'])
    ->name('portfolio.destroy');