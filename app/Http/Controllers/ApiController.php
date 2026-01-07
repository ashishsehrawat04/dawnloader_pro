<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DownloadHistory;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;



class ApiController extends Controller
{
    public function sendOtp(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email'
        // ]);

        $user = User::where('email', "ashishkumarjjr@gmail.com")->first();

        if (!$user) {
            return response()->json([
                'status' => 0,
                'message' => 'User not found'
            ], 404);
        }

        $otp = random_int(100000, 999999);

        $user->update([
            'otp' => $otp
        ]);

        Mail::raw("Your OTP is: {$otp}. It will expire in 5 minutes.", function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Your OTP Verification Code');
        });

        return response()->json([
            'status' => 1,
            'message' => 'OTP sent successfully'
        ]);
    }
    public function submitlogin(Request $request){


        $check_user =  User::where('email',"ashishkumarjjr@gmail.com")->first();

       if ($request->otp == $check_user->otp ) {


         return response()->json([
                'status' => 1
            ]);

        }else{

             return response()->json([
                'status' => 0
            ]);

        }

    }

    public function UserRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user',
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Registration successful 🎉',
            'user'    => $user
        ], 201);
    }

    public function UserLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }


        $credentials = $request->only('email', 'password');


        if (!Auth::attempt($credentials)) {
            return response()->json([
                'status'  => false,
                'message' => 'Invalid email or password ❌'
            ], 401);
        }


        $user = Auth::user();

        return response()->json([
            'status'  => true,
            'message' => 'Login successful 🎉',
            'user'    => $user
        ], 200);
    }

    public function downloadhistroy(Request $request){

        $history = DownloadHistory::create([
            'user_id' => $request->user_id,
            'file_path'    => $request->videoUrl,
            'status'     => 1,
            'url'           =>$request->videoUrl,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'video downloded successful 🎉',
        ], 200);


    }

    public function downloadData(Request $reqquest){


       $history = DownloadHistory::where('user_id', auth()->id())
                ->latest()
                ->get();

        return view('videos.download-history', compact('history'));


    }

}
