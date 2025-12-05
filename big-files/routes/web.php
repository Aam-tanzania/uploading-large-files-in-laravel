<?php

use App\Http\Controllers\Admin\SongUploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/admin/songs/upload', [SongUploadController::class, 'store'])->name('admin.songs.upload');