<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            $user = User::where('email', $request->email)->first();

            if ($user) {
                // If password in DB is plain text / legacy format (not starting with standard bcrypt prefixes)
                if (!str_starts_with($user->password, '$2y$') && !str_starts_with($user->password, '$2a$') && !str_starts_with($user->password, '$2b$')) {
                    if ($user->password === $request->password) {
                        $user->password = Hash::make($request->password);
                        $user->save();
                        Auth::login($user);

                        if (Auth::user()->type == 'admin') {
                            return redirect()->route('admin.index');
                        }
                        return redirect()->route('home');
                    } else {
                        return redirect()->back()->with('error', 'Adresse e-mail ou mot de passe incorrect.')->withInput();
                    }
                }
            }

            $credentials = $request->only('email', 'password');

            if (auth()->attempt($credentials)) {
                if (Auth::user()->type == 'admin') {
                    return redirect()->route('admin.index');
                } else {
                    return redirect()->route('home');
                }
            }
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Adresse e-mail ou mot de passe incorrect.')->withInput();
        }

        return redirect()->back()->with('error', 'Adresse e-mail ou mot de passe incorrect.')->withInput();
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect()->route('login');
    }


    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}