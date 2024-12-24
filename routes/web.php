<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('index'); // Route for the index page
});

Route::get('/form-handler', [AdminController::class, 'formHandler'])->name('formHandler');
Route::post('/formhandler/send', [AdminController::class, 'formHandler_send'])->name('formHandler_send') ->withoutMiddleware(['web']);
Route::post('/formhandler/search', [AdminController::class, 'formHandler_search'])->name('formHandler_search') ->withoutMiddleware(['web']);

Route::get('/session-handler', [AdminController::class, 'sessionHandler'])->name('sessionHandler');
Route::post('/sessionhandler', [AdminController::class, 'sessionHandler_session'])->name('sessionHandler_session') ->withoutMiddleware(['web']);
