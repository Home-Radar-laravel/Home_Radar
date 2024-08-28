<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class admin_UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        try {
            $users = User::with('role')->paginate(10); // Change pagination as needed
            $totalUsers = User::count(); // Total number of users for display
            return view('users.index', compact('users', 'totalUsers'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve users', 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        $roles = Role::all(); // Ensure Role model exists and has data
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'required|string|max:20',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6',
                'role_id' => 'required|exists:roles,id',
            ]);

            $validatedData['password'] = Hash::make($validatedData['password']);

            User::create($validatedData);

            return redirect()->route('users.index')->with('success', 'User created successfully');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to create user');
        }
    }

    /**
     * Display the specified user.
     */
    public function show(User $user)
{
    try {
        $user->load('role'); 
        return view('users.show', ['user' => $user]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to retrieve user', 'message' => $e->getMessage()], 500);
    }
}

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        try {
            $roles = Role::all();
            return view('users.edit', [
                'user' => $user,
                'roles' => $roles, 
                'userRole' => $user->role_id 
            ]);
        } catch (\Exception $e) {
            return redirect()->route('users.index')
                ->with('error', 'Failed to retrieve user for editing: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'sometimes|string|max:255',
                'phone' => 'sometimes|string|max:20',
                'email' => 'sometimes|email|unique:users,email,' . $user->id,
                'password' => 'sometimes|string|min:8',
                'role_id' => 'sometimes|exists:roles,id',
            ]);
    
            if ($request->has('password')) {
                $validatedData['password'] = Hash::make($validatedData['password']);
            }
    
            $user->update($validatedData);
    
            return redirect()->route('users.index')
                ->with('success', 'User updated successfully');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->route('users.index')
                ->with('error', 'Failed to update user: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response()->json(['message' => 'User deleted successfully'], 204);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete user', 'message' => $e->getMessage()], 500);
        }
    }
}
