<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    //



    public function upload(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'resume' => 'required|mimes:pdf,doc,docx|max:2048', // Adjust allowed file types and size as needed
        ]);

        // Store the uploaded file in the storage/app/public/resumes directory
        $path = $request->file('resume')->store('public/resumes');

  //      dd($request,$request->user_id);

        // You can save the file path in your database if needed
         $resume = new Resume();
         $resume->name=$request->name;
         $resume->file_path = $path;
        $resume->active= $request->active;
         $resume->user_id =$request->user_id;
         $resume->save();

        return back()->with('success', 'Resume uploaded successfully.');
    }

}
