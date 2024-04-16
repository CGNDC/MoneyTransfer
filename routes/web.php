<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\MoneyTransferController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\BranchManagementController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('login');
    });

    Route::get('admin', [RegisteredUserController::class, 'create'])
                ->name('admin');

    Route::post('admin', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'create'])
        ->name('dashboard');

    Route::get('/MoneyTransfer', [MoneyTransferController::class, 'showForm'])->name('MoneyTransfer.form');
    Route::post('/MoneyTransfer/process', [MoneyTransferController::class, 'process'])->name('MoneyTransfer.process');
    Route::get('/MoneyTransfer/results', [MoneyTransferController::class, 'results'])->name('MoneyTransfer.results');
    Route::get('/MoneyTransfer/edit/{id}', [MoneyTransferController::class, 'edit'])->name('MoneyTransfer.edit');
    Route::put('/MoneyTransfer/update/{id}', [MoneyTransferController::class, 'update'])->name('MoneyTransfer.update');
    Route::post('/MoneyTransfer/receive/{id}', [MoneyTransferController::class, 'receive'])->name('MoneyTransfer.receive');
    Route::post('/MoneyTransfer/cancel/{id}', [MoneyTransferController::class, 'cancel'])->name('MoneyTransfer.cancel');


    Route::get('UserManagement', [UserManagementController::class, 'create'])
                ->name('UserManagement');
    Route::post('UserManagement', [UserManagementController::class, 'store']);

    Route::get('BranchManagement', [BranchManagementController::class, 'create'])
                ->name('BranchManagement');
    Route::post('BranchManagement', [BranchManagementController::class, 'store']);
    Route::get('/BranchManagement/{id}/edit', [BranchManagementController::class, 'edit'])->name('BranchManagement.edit');
    Route::put('/BranchManagement/{id}', [BranchManagementController::class, 'update'])->name('BranchManagement.update');
    Route::delete('/BranchManagement/{id}', [BranchManagementController::class, 'delete'])->name('BranchManagement.destroy');

    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout.get');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
