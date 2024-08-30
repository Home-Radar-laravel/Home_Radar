<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\AdminNewUserNotification;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log; 
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function registerView()
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:10'],
            'role_id' => ['required', 'exists:roles,id'],
        ]);
    }

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'role_id' => $data['role_id'],
        ]);

        $administrators = User::whereHas('role', function ($q) {
            $q->where('role_name', 'administrator');
        })->get();

        foreach ($administrators as $administrator) {
            $administrator->notify(new AdminNewUserNotification($user));
        }

        return $user;
    }

    protected function redirectTo()
    {
        $roleId = auth()->user()->role_id;

        Log::info('User role ID after registration:', ['role_id' => $roleId]); // استخدم Log بدلاً من \Log

        if ($roleId == 1) {
            return '/login'; 
        }

        return '/user/dashboard'; 
    }

    
}
