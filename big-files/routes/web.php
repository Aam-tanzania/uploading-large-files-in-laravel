<?php

use App\Http\Controllers\Admin\SongUploadController;
use Illuminate\Support\Facades\Route;

// THIS IS A SIMPLE UI THAT WORK FINE ALSO
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [SongUploadController::class, 'index'])->name('admin.songs.index');

Route::post('/admin/songs/upload', [SongUploadController::class, 'store'])->name('admin.songs.upload');