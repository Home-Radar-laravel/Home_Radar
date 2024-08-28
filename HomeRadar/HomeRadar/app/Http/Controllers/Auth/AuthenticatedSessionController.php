<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Check the user's role and redirect accordingly
            $user = Auth::user();
            $roleNumber = $user->role->id; // Assuming 'id' is the role number
            // dd($user->id);
            if ($roleNumber == 2) { // Renter
                return redirect()->route('dashboard.add-listing');
            } elseif ($roleNumber == 3) { // Client
                return redirect()->route('home');
            }

            // If the role doesn't match renter or client, you can add a default redirect
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function destroy(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/home'); // Redirect to the home page
}
}

