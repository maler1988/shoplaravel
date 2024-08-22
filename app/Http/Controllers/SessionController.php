<?php

namespace App\Http\Controllers;
use App\Http\Requests\Auth\Login as LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        return redirect()->intended(route('home'));
    }

    /**
     * Удалить авторизованную сессию
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('home'));
    }

    public function profile()
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);

        return view('auth.profile', ['user'=>$user]);
    }

}
