<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate incoming data
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'telephone' => ['nullable', 'string', 'max:20'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['nullable', 'string', 'max:255'],
            'pfp' => ['nullable', 'image', 'max:2048']
        ]);

        try {
            // Handle profile picture upload
            $imagePath = null;
            if ($request->hasFile('pfp')) {
                $imagePath = $request->file('pfp')->store('profiles', 'public'); // Saves to storage/app/public/profiles
            }

            // Create user
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'telephone' => $validatedData['telephone'] ?? null,
                'password' => Hash::make($validatedData['password']),
                'address' => $validatedData['address'] ?? null,
                'pfp' => $imagePath,
            ]);

            // Fire Registered event
            event(new Registered($user));

            // Log the user in
            Auth::login($user);

            // Redirect to home or intended page
            return redirect()->intended('/'); // Explicitly specify a default route if intended route is not available
        } catch (\Exception $e) {
            // Catch any exception and redirect back with error message
            return back()->withInput()->withErrors(['error' => 'Registration failed: ' . $e->getMessage()]);
        }
    }
}
