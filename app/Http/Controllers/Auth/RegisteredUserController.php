<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Language;
use App\Models\Interest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;
use App\Jobs\SendWelcomeEmail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $languages = Language::all();
        $interests = Interest::all();

        return view('auth.register', compact('languages', 'interests'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'id_number' => ['required', 'string', 'max:255', 'unique:users,id_number'],
            'date_of_birth' => ['required', 'date'],
            'language' => ['required', 'exists:languages,id'],
            'interests' => ['sometimes', 'array'],
            'interests.*' => ['exists:interests,id'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        dd($attributes);
    
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'id_number' => Crypt::encryptString($request->id_number),
            'date_of_birth' => $request->date_of_birth,
            'language_id' => $request->language,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        // Attach interests if provided
        if ($request->has('interests')) {
            $user->interests()->attach($request->interests);
        }
    
        event(new Registered($user));
    
        Auth::login($user);
    
        // Dispatch job to send a welcome email
        SendWelcomeEmail::dispatch($user);
    
        return redirect(route('dashboard', absolute: false));
    }
}
