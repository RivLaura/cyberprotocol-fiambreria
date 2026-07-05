<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Muestra la vista de solicitud de enlace de restablecimiento.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Maneja una solicitud de enlace de restablecimiento entrante.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Enviaremos el enlace de restablecimiento de contrasena a este usuario. Una vez que hayamos
        // intentado enviar el enlace, examinaremos la respuesta y veremos el mensaje que
        // debemos mostrar al usuario. Finalmente, enviaremos una respuesta adecuada.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                        ->withErrors(['email' => __($status)]);
    }
}
