<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role; // Import the Role model


class WelcomeController extends Controller
{
    public function index()
    {
        // Get the counts from the database
 //       $seekerCount = User::where('role', 'seeker')->count();
        $companyCount = Company::count();
        $jobCount = Job::count();

// Find the 'Seeker' role
        $seekerRole = Role::where('name', 'Seeker')->first();

// Count the users with the 'Seeker' role
        $seekerCount = User::whereHas('roles', function ($query) use ($seekerRole) {
            $query->where('name', $seekerRole->name);
        })->count();

// $seekerCount now contains the count of Seekers







        return view('welcome', compact('seekerCount', 'companyCount', 'jobCount'));
    }
}
