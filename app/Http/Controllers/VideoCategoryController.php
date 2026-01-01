<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\VideoCategory;

class VideoCategoryController extends Controller
{
    public function category(Request $request,$category){

        $videos = Video::where("category",$category)->get();

         $category = VideoCategory::all();

       return view('videos.category', compact('videos','category'));
    }
}
