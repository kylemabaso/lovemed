<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Language;
use App\Models\Interest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Encryption\DecryptException;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // Decrypt the id_number before passing it to the view
        // try {
        //     $user->id_number = Crypt::decryptString($user->id_number);
        // } catch (DecryptException $e) {
        //     // Handle the error, maybe log it or show an error message
            
        //     return redirect()->back()->withErrors(['error' => 'Invalid ID Number']);
        // }
    
        $languages = Language::all();
        $interests = Interest::all();

        return view('pages.users.edit', compact('user', 'languages', 'interests'));
    }

    public function update(Request $request, User $user)
    {
        $attributes = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'id_number' => ['required', 'string', 'max:255', 'unique:users,id_number,' . $user->id],
            'date_of_birth' => ['required', 'date'],
            'language' => ['required', 'exists:languages,id'],
            'interests' => ['sometimes', 'array'],
            'interests.*' => ['exists:interests,id'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'confirmed', \Illuminate\Validation\Rules\Password::defaults()],
        ]);

        // Encrypt the id_number before saving
        // $attributes['id_number'] = Crypt::encryptString($attributes['id_number']);

        if ($attributes['password']) {
            $attributes['password'] = Hash::make($attributes['password']);
        } else {
            unset($attributes['password']);
        }

        // Update user with validated attributes
        $user->update($attributes);

        // Sync interests if they exist
        if ($request->has('interests')) {
            $user->interests()->sync($attributes['interests']);
        }

        return redirect()->back()->with('success', 'user updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Method to check if email is unique
    public function checkEmail(Request $request)
    {
        $email = $request->email;
        $exists = User::where('email', $email)->exists();
        return response()->json(['exists' => $exists]);
    }

    // Method to check if phone is unique
    public function checkPhone(Request $request)
    {
        $phone = $request->phone;
        $exists = User::where('phone', $phone)->exists();
        return response()->json(['exists' => $exists]);
    }

    // Method to check if ID number is unique
    public function checkId(Request $request)
    {
        $id_number = $request->id_number;
        $exists = User::where('id_number', $id_number)->exists();
        return response()->json(['exists' => $exists]);
    }
}
