<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;


Route::get('/', function () {
    return view('landing');
});

Route::get('/track-visitor', [VisitorController::class, 'track']);
Route::get('/visitors/count', [VisitorController::class, 'totalVisitors']);
