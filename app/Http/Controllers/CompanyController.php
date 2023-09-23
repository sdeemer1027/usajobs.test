<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
//use App\Models\Company;
//use Spatie\Permission\Models\Role;

class CompanyController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $company=Company::where('user_id',$user->id)->with('jobs')->get();
 //       $companies = Company::all(); // Retrieve a collection of companies

        foreach ($company as $comp) {
            $jobs = $comp->jobs; // Access the relationship for each company
        }
        return view('company_dashboard',compact('company','jobs'));
    }


    public function edit($id)
    {

//dd($id);
        $company = Company::findOrFail($id);

        return view('company.edit', compact('company'));
   //         [
  //          'user' => $request->user(),
  //          'company' => $request->company(),
  //      ]);
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        // Add authorization logic to ensure only the company owner or authorized users can update
        // Example: $this->authorize('update', $company);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            // Add validation rules for other fields as needed
        ]);

        $company->update([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'zip' => $request->input('zip'),
            'description' => $request->input('description'),
            // Update other fields as needed
        ]);

        return redirect()->route('company.dashboard', $company->id)->with('success', 'Company information updated successfully');
    }


    public function destroy(Request $request): RedirectResponse
    {
        return Redirect::to('/');
    }
}
