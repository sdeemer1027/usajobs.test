<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Company;
use App\Models\Job;
use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    //

    public function create()
    {
        $user = Auth::user();

        // Fetch the company associated with the user
        $company = Company::where('user_id', $user->id)->first();

       // dd($user,$company);
        return view('jobs.create', compact('user','company'));
    }

    public function store(Request $request)
    {
        // Validate and store the job details

   // dd($request);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
  //          'salarymin' => 'nullable|numeric',
            // Add validation rules for other fields as needed
        ]);

        $salarymin =$request->input('salarymin');
       // if($salarymin){
        $salarymin = str_replace(',', '', $salarymin);
        $salarymin= intval($salarymin);
           $hourlymin = $salarymin/2080;
  //          dd($hourlymin,$salarymin,$request);
       // }
        $salarymax =$request->input('salarymax');
        // if($salarymin){
        $salarymax = str_replace(',', '', $salarymax);
        $salarymax= intval($salarymax);
        $hourlymax = $salarymax/2080;
        //          dd($hourlymin,$salarymin,$request);
        // }



        $job = Job::create([
            'name' => $request->input('name'),
            'company_id' => $request->input('company_id'),
            'user_id' => $request->input('user_id'),
            'type' => $request->input('type'),
            'salarymin' => $salarymin, //$request->input('salarymin'),
            'salarymax' => $salarymax, //$request->input('salarymax'),
            'hourlymax' =>  $hourlymax,
            'hourlymin' => $hourlymin,
            'description' => $request->input('description'),
            // Update other fields as needed
        ]);


        $user = Auth::user();

        $company=Company::where('user_id',$user->id)->with('jobs')->get();
        foreach ($company as $comp) {
            $jobs = $comp->jobs; // Access the relationship for each company
        }

        return view('company_dashboard',compact('company','jobs'));





    }

    public function edit(Job $job)
    {
        // Authorize the user to edit the job
        // Display the job edit form
    }

    public function update(Request $request, Job $job)
    {
        // Authorize the user to update the job
        // Validate and update the job details
    }

    public function destroy(Job $job)
    {
        // Authorize the user to delete the job
        // Delete the job
    }



    public function showDetails($id)
    {
        // Retrieve job details by ID
        $job = Job::find($id);
        $company = Company::find($job->company_id);

        // Return the job details view with the job data
        return view('jobs.show', ['job' => $job, 'company'=> $company,]);
    }

    public function apply(Request $request, Job $job)
    {
        $user = Auth::user();

        $resume =Resume::where('user_id',$user->id)->get();
if($resume->isEmpty()) {

    session()->flash('success', 'This is a success message is it not?? .');

            return redirect()->route('seeker.resumes', ['job' => $job]);
 //   dd($resume);->with('success', 'You need an Active Resume on File')
}

        $application = new Application();
        $application->job_id = $job->id;
        $application->user_id = $user->id;
        $application->company_id = $job->company_id;
        $application->status= "pending";
        $application->created_at = NOW();
        $application->updated_at = NOW();
        $application->save();




        return redirect()->route('seeker.applied', ['job' => $job])->with('success', 'Application submitted successfully.');
    }


}
