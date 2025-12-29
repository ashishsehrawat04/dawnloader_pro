<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoCategoryController extends Controller
{
    public function category(Request $request,$category){

        $videos = Video::where("category",$category)->get();

       return view('videos.category', compact('videos'));
    }
}
