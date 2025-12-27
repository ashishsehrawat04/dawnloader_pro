<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\VideoCategory;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function login_page(Request $request)
    {
        return view('admin.login');
    }

    public function dashboard(Request $request){
        return view('admin.dashboard');
    }



    public function addvideos(Request $request)
    {




        $video = Video::create([
            'user_id'         => 1,
            'title'           => $request->title,
            'source_url'      => $request->source_url,
            'downloaded_file' => $request->downloaded_file,
            'size'            => $request->size,
            'slug'            => Str::slug($request->title ?? 'video-' . time()),
            'platform'        => $request->platform,
        ]);

        return response()->json([
            'status'  => 1,
            'message' => 'Video added successfully',
            'data'    => $video
        ]);
    }

    public function Videos(Request $request){

            $categories = VideoCategory::pluck('slug', 'id'); // ['id' => 'slug']

            return view('admin.videos', compact('categories'));


    }

}
