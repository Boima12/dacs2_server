<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AccountController;

Route::get('/', function () {
    return view('index'); // Route for the index page
});

Route::get('/form-handler', [AdminController::class, 'formHandler'])->name('formHandler');
Route::post('/formhandler/send', [AdminController::class, 'formHandler_send'])->name('formHandler_send') ->withoutMiddleware(['web']);
Route::post('/formhandler/search', [AdminController::class, 'formHandler_search'])->name('formHandler_search') ->withoutMiddleware(['web']);

Route::get('/session-handler', [AdminController::class, 'sessionHandler'])->name('sessionHandler');
Route::post('/sessionhandler', [AdminController::class, 'sessionHandler_session'])->name('sessionHandler_session') ->withoutMiddleware(['web']);

Route::post('/account/ac', [AccountController::class, 'account_ac'])->name('account_ac') ->withoutMiddleware(['web']);
Route::post('/account/navibar', [AccountController::class, 'account_navibar'])->name('account_navibar') ->withoutMiddleware(['web']);
Route::post('/account/dangNhap', [AccountController::class, 'account_dangNhap'])->name('account_dangNhap') ->withoutMiddleware(['web']);
Route::post('/account/dangKy', [AccountController::class, 'account_dangKy'])->name('account_dangKy') ->withoutMiddleware(['web']);
Route::post('/account/registering', [AccountController::class, 'account_registering'])->name('account_registering') ->withoutMiddleware(['web']);
