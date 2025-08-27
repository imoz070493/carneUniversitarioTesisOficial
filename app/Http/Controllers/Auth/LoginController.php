<?php

namespace App\Http\Controllers\Auth;

use App\Acceso;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        \Log::info($request->all());

        $email = $request->get('email');
        $password = $request->get('password');

        $this->validate($request, [
            // 'email'           => 'required|max:255|email',
            'email'           => 'required|max:255',
            'password'           => 'required',
        ]);

        if (Auth::attempt([
            // 'email' => $email,
            'usuario' => $email,
            'password' => $password,
            'estado' => 'activo'])
        ) {
            // Verificar si el correo fue confirmado
            if (is_null($request->user()->email_verified_at) && env('MAIL_VALIDACION')=='true') {
                
                $request->user()->sendEmailVerificationNotification();
                // Auth::logout();
                return view("auth.verify-notice");

                // return redirect()->back()
                //     ->withInput()
                //     ->withErrors([
                //         'email_verification' => 'Debes verificar tu correo electrónico antes de iniciar sesión.',
                //     ]);
            }
            Acceso::guardarDatos(['usuario_id'=>$request->user()->id]);

            // Success
            return redirect()->intended($this->redirectTo);
            // return view($this->redirectTo);
        } else {
            // Go back on error (or do what you want)
            return redirect()->back()->withInput()
                    ->withErrors(['usuario_incorrecto' => ['Usuario y/o Contraseña incorrectos.']]);
        }

    }
}
