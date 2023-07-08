<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function viewSignUp()
    {
        return view('pages.authentication.boxed.signup', ['title' => 'SignUp']);
    }

    public function register(UserRequest $request)
    {
        $formFields = $request->all();
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);
        auth()->login($user);

        return redirect('/modern-dark-menu/dashboard');
        // return redirect(getRouterValue() . '/dashboard');
    }

    public function viewSignIn()
    {
        return view('pages.authentication.boxed.signin', ['title' => 'SignIn']);
    }

    public function login(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/modern-dark-menu/dashboard');
            // return redirect(getRouterValue() . '/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/modern-dark-menu/sign-in');
        // return redirect(getRouterValue() . '/sign-in');
    }
}
