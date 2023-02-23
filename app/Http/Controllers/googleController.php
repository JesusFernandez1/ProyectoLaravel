<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class googleController extends Controller
{
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        $googleuser = Socialite::driver('google')->user();

        $user = User::where('email', $googleuser->getEmail())->first();

        if ($user) {
            Auth::login($user);
            return redirect()->route('tareas.index');

        } else {

        $user = User::updateOrcreate(
            [
                'provider_id' => $googleuser->getId()
            ],
            [
                'email' => $googleuser->getEmail(),
                'name' => $googleuser->getName(),
                'fecha_alta' => date("Y-m-d\TH:i"),
                'tipo' => 'Operario',
            ]
        );

        Auth::login($user);
        return redirect()->route('tareas.index');
        }
    }
}
