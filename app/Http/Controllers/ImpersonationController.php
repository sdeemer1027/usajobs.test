<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ImpersonationController extends Controller
{

    public function showImpersonationForm()
    {


// Find the 'Seeker' role
        $seekerRole = Role::where('name', 'Seeker')->first();



        // Get a list of users who can be impersonated (customize this query as needed)
        $usersToImpersonate = User::whereHas('roles', function ($query) use ($seekerRole) {
            $query->where('name', $seekerRole->name);
        })->get();

        //where('role', 'Seeker')->get();

        // Pass the list of users to the view
        return view('admin.impersonate', compact('usersToImpersonate'));
    }


    public function startImpersonate(User $userToImpersonate)
    {
        // Store the original user's ID in the session
        session(['admin_id' => auth()->user()->id]);

        // Log in as the target user
        auth()->login($userToImpersonate);

        // Pass the user to impersonate to the view
        return view('admin.impersonate', compact('userToImpersonate'));
    }

    public function stopImpersonate()
    {
        // Get the admin's ID from the session
        $adminId = session('admin_id');

        // Log in as the admin user
        auth()->loginUsingId($adminId);

        // Clear the stored admin ID from the session
        session()->forget('admin_id');

        // Redirect to the admin's dashboard or control panel
        return redirect()->route('admin.dashboard');
    }
}
