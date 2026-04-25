<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Enums\UserRoleEnum;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.auth.login-register');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Redirect based on user role
            switch ($user->role->value) {
                case UserRoleEnum::ADMIN->value:
                    return redirect()->intended('/admin');
                case UserRoleEnum::STAFF->value:
                    return redirect()->intended('/staff');
                case UserRoleEnum::CUSTOMER->value:
                    return redirect()->intended('/dashboard');
                default:
                    return redirect('/');
            }
        }

        throw ValidationException::withMessages([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Public registration always creates a customer account
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => UserRoleEnum::CUSTOMER,
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Create staff or admin account (admin only)
     */
    public function createUserAccount(Request $request)
    {
        // Verify the authenticated user is an admin
        if (!Auth::check() || Auth::user()->role !== UserRoleEnum::ADMIN) {
            return redirect()->back()->with('error', 'Unauthorized. Only admins can create accounts.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:staff,admin',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => UserRoleEnum::from($validated['role']),
        ]);

        return redirect()->back()->with('success', "Account created successfully! {$validated['role']} '{$user->name}' has been added to the system.");
    }
}