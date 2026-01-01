<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\User;
use App\Models\VideoCategory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function login_page(Request $request)
    {
        return view('admin.login');
    }

    public function dashboard(Request $request){

        $user = User::where('email', "ashishkumarjjr@gmail.com")->first();

        return view('admin.dashboard', compact('user'));
    }

    public function addvideos(Request $request)
    {
        // // ✅ Validation
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'source_url' => 'required|url',
        //     'downloaded_file' => 'required|file|mimes:mp4,mkv,avi|max:51200',
        //     'category_id' => 'nullable|string',
        //     'platform' => 'nullable|string',
        // ]);

        try {

            // 📁 upload folder
            $folder = 'uploads/videos';

            $file = $request->file('downloaded_file');

            $size = $file->getSize();


            $filename = time() . '_.mp4';
            $file->move(public_path($folder), $filename);
            $path = $folder . '/' . $filename;


            // 🧾 save DB
            Video::create([
                'user_id'    => 1,
                'title'      => $request->title,
                'source_url' => $request->source_url,
                'video'      => $path,
                'category'   => $request->category_id,
                'size'       => $size,
                'slug'       => Str::slug($request->title),
                'platform'   => $request->platform,
            ]);

            // ✅ SUCCESS → back to blade
            return redirect()
                ->back()
                ->with('success', 'Video uploaded successfully 🎉');

        } catch (\Exception $e) {

            // ❌ log error (optional)
            Log::error($e->getMessage());

            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    // public function addvideos(Request $request)
    // {

    //     $folder = 'uploads/videos';

    //     $file = $request->file('downloaded_file');


    //     $filename = time() . '_.mp4';
    //     $file->move(public_path($folder), $filename);
    //     $path = $folder . '/' . $filename;


    //     //   dd($path);

    //     $video = Video::create([
    //         'user_id'         => 1,
    //         'title'           => $request->title,
    //         'source_url'      => $request->source_url,
    //         'video'           => $path,
    //         'category'        =>$request->category_id,
    //         'size'            => $request->size,
    //         'slug'            => Str::slug($request->title ?? 'video-' . time()),
    //         'platform'        => $request->platform,
    //     ]);

    //     return response()->json([
    //         'status'  => 1,
    //         'message' => 'Video added successfully',
    //         'data'    => $video
    //     ]);
    // }

    public function Videos(Request $request){

            $categories = VideoCategory::pluck('slug', 'id');
            return view('admin.videos-store', compact('categories'));

    }

    public function VideosList(Request $request){

        $videos  = Video::all();
        return view('admin.videos-list', compact('videos'));

    }

    public function videoscategoryList(Request $request){

        $VideoCategory  = VideoCategory::all();
        return view('admin.video-category-list', compact('VideoCategory'));
    }

    public function Videoscategory(Request $request){
            return view('admin.video-category-store');
    }

    public function addVideoscate(Request $request){
        try {

             if ($request->hasFile('icon')) {
                $folder = 'uploads/icons';
                $file = $request->file('icon');

                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                $file->move(public_path($folder), $filename);

                $icon = $folder . '/' . $filename;
            } else {
                $icon = null;
            }


            VideoCategory::create([
                "name" =>$request->name,
                "slug" =>$request->slug,
                "status" =>$request->status,
                "icon"  =>$icon
            ]);


            return redirect()
                ->back()
                ->with('success', 'Video category  uploaded successfully 🎉');

        } catch (\Exception $e) {

            // ❌ log error (optional)
            Log::error($e->getMessage());

            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

}
