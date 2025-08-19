<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){

        \Log::info($request->all());
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = request(['email', 'password']);

        //Verificar Credenciales
        if(!Auth::attempt($credentials)){
            return response()->json([
                'message' => 'Credenciales incorrectas', 401
            ]);
        }

        $user = $request->user();

        $tokenAuth = $user->createToken("Personal Access Token");

        // $token = $tokenAuth->token;
        // $token->expires_at = \Carbon\Carbon::now()->addWeeks(1);
        // $token->save();

        // dd($tokenAuth->token);

        return response()->json([
            'access_token' => $tokenAuth->accessToken,
            'token' => 'Bearer ',
            'expires_at' => \Carbon\Carbon::parse($tokenAuth->token->expires_at)->toDateTimeString()
        ]);

    }

    public function user(Request $request){
        // dd($request->user());

        return response()->json(
            $request->user()
        );
    }

    public function logout(Request $request){
        // dd($request->user());
        // dd($request->user()->token());
        $request->user()->token()->revoke();

        return response()->json(
            ['message'=>'Sesion terminada con exito']
        );
    }

    public function index(Request $request){
        dd($request->all);
    }
}
