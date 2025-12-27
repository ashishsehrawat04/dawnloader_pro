<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ApiController extends Controller
{
    public function verifyOtp(Request $request){

        $check_user =  User::where('email',"ashishkumarjjr@gmail.com")->first();

       if ($check_user) {
            $otp = rand(100000, 999999);
            return response()->json([
                'otp' => $otp,
                'status' => 1
            ]);
        }
        else{
           $otp = rand(100000, 999999);

            return response()->json([
                'otp' => $otp,
                'status' => 1
            ]);
        }
    }

    public function submitlogin(Request $request){

         return response()->json([
                'status' => 1
            ]);

    }
}
