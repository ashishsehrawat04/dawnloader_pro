<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;



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
        'otp' => $otp,
        'otp_expires_at' => Carbon::now()->addMinutes(5),
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

       if ($check_user &&  $request->otp == $check_user->otp ) {


         return response()->json([
                'status' => 1
            ]);

        }else{

             return response()->json([
                'status' => 0
            ]);

        }

    }
}
