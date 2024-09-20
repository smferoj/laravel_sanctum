<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    } 
    public function __invoke(RegisterRequest $request)
    {
       

       
     $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
     ]);

     $token = $user->createToken('auth_token')->plainTextToken;

     Mail::to($user)->send(new EmailVerification($user));

     return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
     ], 201);
    }
}
