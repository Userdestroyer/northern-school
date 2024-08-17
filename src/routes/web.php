<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\Writing\BookController;
use Illuminate\Support\Facades\Route;

// main page
Route::get('/', [ IndexController::class, 'index' ]);

// book list
Route::prefix('books')->group(function () {
    Route::get('/', [ BookController::class, 'list' ]);
    Route::get('/{book}', [ BookController::class, 'book' ]);
    Route::get('/{book}/{chapter}', [ BookController::class, 'chapter' ]);
});

// screenplay
