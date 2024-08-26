<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Logout Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles logging out users from the application and
    | redirecting them to the login screen.
    |
    */

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
