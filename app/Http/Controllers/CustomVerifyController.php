<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class CustomVerifyController extends Controller
{
    public function verify($id, $hash, Request $request)
    {
        $user = User::findOrFail($id);

        // Validar el hash
        if (! hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            abort(403, 'El enlace de verificación no es válido.');
        }

        if (! $user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        return view('emails.verified-success');
    }
}
