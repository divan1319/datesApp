<?php

namespace App\Presentation\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerifyController extends Controller{
    public function __construct()
    {
        
    }
    public function verification(Request  $request, string $id){
       
       
        if(!$request->hasValidSignature()){
            return response()->json(['msg'=>"Invalid/Expired url provided"],401);
        }

        $user = User::findOrFail($id);

        if(!$user->hasVerifiedEmail()){
            $user->markEmailAsVerified();
        }

        return redirect()->to('/');


    }
}