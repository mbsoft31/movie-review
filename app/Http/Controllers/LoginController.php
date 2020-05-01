<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    /**
     * Handle an authentication attempt.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        if ($request->has("intended"))
            Session::push("url.intended", $request->get("intended"));

        $credentials = $request->only('email', 'password');

        dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials)) {
            dd(redirect()->intended('/'));
            return redirect()->intended('/');
        }
    }
}
