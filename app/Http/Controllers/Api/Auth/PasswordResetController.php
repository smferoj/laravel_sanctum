<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Mail\ResetPasswordLink;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\LinkEmailRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{

    public function __construct(){
        $this->middleware(['guest']);
    } 

    public function SendResetLinkEmail(LinkEmailRequest $request){
     
        $url = URL::temporarySignedRoute('password.reset', now()->addMinute(30), ['email' => $request->email]);
        // dd($url);
        $url = str_replace(env('APP_URL'), env('FRONTEND_URL'), $url);
        // dd($url);
        Mail::to($request->email)->send(new ResetPasswordLink($url));
        return response()->json([
          'message' => 'Reset Password link sent on your email'
        ]);

    }

    public function reset(ResetPasswordRequest $request){

        $user = User::whereEmail($request->email)->first();

        if(!$user){
            return response()->json([
                'message' => 'User not found'
              ],404);
        }
         $user->password = Hash::make($request->password);
         $user->save();

         return response()->json([
            'message' => 'Password reset successfully'
          ],200);
    }

}
