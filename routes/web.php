<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\videoCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\VideoDownloaderController;




Route::get('/', [VisitorController::class, 'landing_page']);
Route::get('/track-visitor', [VisitorController::class, 'track']);
Route::get('/visitors/count', [VisitorController::class, 'totalVisitors']);
Route::get('/category/{category}', [videoCategoryController::class, 'category']);


Route::get('/admin', [AdminController::class, 'login_page']);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
Route::get('/admin/videos', [AdminController::class, 'Videos'])->name('videos');
Route::post('/admin/add_videos', [AdminController::class, 'addVideos'])->name('videos.store');

Route::get('/api/otp-verify', [ApiController::class, 'sendOtp'])->name('otp.verify');
Route::get('/api/submit', [ApiController::class, 'submitlogin'])->name('submit.login');

Route::get('/video-download', [VideoDownloaderController::class, 'downloadVideo'])->name('video.url-video-download');



