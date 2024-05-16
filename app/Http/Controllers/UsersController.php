<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
