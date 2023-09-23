<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Company;
use App\Models\Job;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeekerController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        $resume =Resume::where('user_id',$user->id)->get();

/*
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://gas-price.p.rapidapi.com/stateUsaPrice?state=FL",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: gas-price.p.rapidapi.com",
                "X-RapidAPI-Key: a3e9275d0fmshdecd2e5c817cc47p1b5cc3jsn41754bb25f1a"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }

        dd($response);
*/







        return view('seeker_dashboard', compact('user','resume'));
    }
    public function resumes()
    {
        $user = Auth::user();
        $resume =Resume::where('user_id',$user->id)->get();
        return view('seeker.resumes', compact('user','resume'));
    }
    public function appliedto()
    {
        $user = Auth::user();
        $appliedto = Application::where('user_id',$user->id)->get();
// Get the actual application IDs from the collection
        $appliedtoIds = $appliedto->pluck('id')->toArray();
// Retrieve the applications by IDs
        $applications = Application::whereIn('id', $appliedtoIds)->get();

// Loop through the applications and add the job name to each item
        $appliedto = $applications->map(function ($application) {
            // Access the associated job and its name
            $jobName = $application->job->name;

            // Add the job name to the application item
            $application->job_name = $jobName;

            return $application;
        });

// Loop through the applications to add company names
        $appliedto->each(function ($application) {
            // Retrieve the company name based on company_id
            $company = Company::find($application->company_id);

            // Add the company name to the application object
            $application->name = $company ? $company->name : null;
        });

        return view('seeker.applied', compact('user','appliedto'));
    }

    public function findjobs()
    {
        $user = Auth::user();
        $appliedJobIds = Application::where('user_id', $user->id)->pluck('job_id')->toArray();

        $availjobs = Job::where('status', 'active')
            ->join('companies', 'jobs.company_id', '=', 'companies.id')
            ->whereNotIn('jobs.id', $appliedJobIds) // Specify the table alias
            ->select('jobs.*', 'companies.name as company_name')
             ->get();
        return view('seeker.findjobs', compact('user','availjobs'));
    }


}
