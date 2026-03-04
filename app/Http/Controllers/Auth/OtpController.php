<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmailOtp;
use App\Models\User;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OtpController extends Controller
{

    // Send OTP
    public function send(Request $request)
    {

        $request->validate([
            'email'=>'required|email|unique:users'
        ]);

        $otp = rand(100000,999999);

        EmailOtp::updateOrCreate(
            ['email'=>$request->email],
            [
                'otp'=>$otp,
                'expires_at'=>now()->addMinutes(5)
            ]
        );

        // Send email
        Mail::raw("Your OTP is: $otp", function($msg) use ($request){

            $msg->to($request->email)
                ->subject("Email Verification OTP");

        });

        return response()->json([
            'status'=>true
        ]);

    }


    // Verify OTP and create user
    public function verify(Request $request)
    {

        $record = EmailOtp::where('email',$request->email)
            ->where('otp',$request->otp)
            ->where('expires_at','>',now())
            ->first();


        if(!$record)
        {
            return response()->json([
                'status'=>false,
                'message'=>'Invalid OTP'
            ]);
        }


        // Create user ONLY AFTER OTP VERIFIED

        $user = User::create([

            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
            'email_verified_at'=>now()

        ]);


        // assign role
        $user->assignRole('user');


        // create account
        Account::create([
            'user_id'=>$user->id,
            'balance_usd'=>0,
            'balance_eur'=>0
        ]);


        Auth::login($user);


        // delete OTP
        $record->delete();


        return response()->json([
            'status'=>true
        ]);

    }

}

