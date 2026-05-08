<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DownloadAttachmentController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');
Route::middleware('auth')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class)->except('show');

        Route::get('activities', ActivityController::class)->name('activities');

        Route::resource('categories', CategoryController::class)->middleware('role:admin');
        Route::resource('labels', LabelController::class)->middleware('role:admin');
    });
    Route::get('/dashboard', DashboardController::class)->middleware(['role:admin|agent'])->name('dashboard');
    Route::get('/download/attachment/{mediaItem}', DownloadAttachmentController::class)->name('attachment-download');
    Route::post('/messages/{ticket}', [MessageController::class, 'store'])->name('message.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('tickets/{ticket}/close', [TicketController::class, 'close'])->name('tickets.close');
    Route::patch('tickets/{ticket}/reopen', [TicketController::class, 'reopen'])->name('tickets.reopen');
    Route::patch('tickets/{ticket}/archive', [TicketController::class, 'archive'])->name('tickets.archive');
    Route::post('tickets/upload', [TicketController::class, 'upload'])->name('tickets.upload');
    Route::resource('tickets', TicketController::class);
});

require __DIR__.'/auth.php';
