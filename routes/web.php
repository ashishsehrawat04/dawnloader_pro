<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\videoCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\VideoDownloaderController;


Route::view('/new', 'header');

Route::get('/', [VisitorController::class, 'landing_page']);
Route::get('/track-visitor', [VisitorController::class, 'track']);
Route::get('/visitors/count', [VisitorController::class, 'totalVisitors']);
Route::get('/category/{category}', [videoCategoryController::class, 'category']);


Route::get('/admin', [AdminController::class, 'login_page']);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
Route::get('/admin/videos', [AdminController::class, 'Videos'])->name('videos.page');
Route::get('/admin/videos-list', [AdminController::class, 'VideosList'])->name('videos.list');
Route::get('/admin/videos-edit', [AdminController::class, 'Videosedit'])->name('videos.edit');
Route::get('/admin/videos-delete', [AdminController::class, 'Videosdestroy'])->name('videos.destroy');
Route::post('/admin/add_videos', [AdminController::class, 'addVideos'])->name('videos.store');

Route::get('/admin/videoscate', [AdminController::class, 'Videoscategory'])->name('videosCategory.page');
Route::get('/admin/videoscat-list', [AdminController::class, 'videoscategoryList'])->name('vid.categorylist');
Route::get('/admin/videoscategory-edit', [AdminController::class, 'Videoscateedit'])->name('VideoCategory.edit');
Route::get('/admin/videoscategory-delete', [AdminController::class, 'Videoscatedestroy'])->name('VideoCategory.destroy');
Route::post('/admin/add_videoscategory', [AdminController::class, 'addVideoscate'])->name('VideoCategory.store');

Route::get('/api/otp-verify', [ApiController::class, 'sendOtp'])->name('otp.verify');
Route::POST('/api/user-register', [ApiController::class, 'UserRegister'])->name('user.register');
Route::POST('/api/user-login', [ApiController::class, 'UserLogin'])->name('user.login');

Route::get('/api/submit', [ApiController::class, 'submitlogin'])->name('submit.login');

Route::get('/video-download', [VideoDownloaderController::class, 'downloadVideo'])->name('video.url-video-download');



