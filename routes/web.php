<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;



Route::get('/', [VisitorController::class, 'landing_page']);
Route::get('/track-visitor', [VisitorController::class, 'track']);
Route::get('/visitors/count', [VisitorController::class, 'totalVisitors']);
Route::get('/category/{slug}', [VisitorController::class, 'categoryWise']);
