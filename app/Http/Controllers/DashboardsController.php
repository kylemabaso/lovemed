<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class DashboardsController extends Controller
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
    public function show()
    {
        $user = Auth::user();

        if ($user->hasRole('Admin|Kratos')) {
            return view('pages.dashboards.admin');
        } elseif ($user->hasRole('Patient')) {
            return view('pages.dashboards.patient');
        } elseif ($user->hasRole('Doctor')) {
            $patients = User::role('Patient')->with('language')->get();
            $employees = User::role(['Pharmacist', 'Admin'])->with('language')->get();

            return view('pages.dashboards.doctor', compact('patients', 'employees'));
        } elseif ($user->hasRole('Pharmacist')) {
            return view('pages.dashboards.pharmacist');
        } else {
            abort(403, 'Unauthorized action.');
        }
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
}
