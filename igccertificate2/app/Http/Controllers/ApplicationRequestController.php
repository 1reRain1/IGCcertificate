<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicantsTemporary;
use App\Models\Applicant;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\CertificateRequestMail;
use Illuminate\Support\Str;
use App\Mail\igcMail;


class ApplicationRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('certificateForm');
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
        $validatedData = $request->validate([
            'FullName' => 'required:255',
            'PlaceOfBirth' => 'required:255',
            'DateOfBirth' => 'required|date|before:today',
            'PhoneNumber' => 'required|numeric', // Assuming phone numbers contain only numbers
            'Email' => 'required|email|unique:users,email|max:255',
            'SkillName' => 'required:255',
            'CV' => 'required|file|mimes:pdf|max:2048' // Only PDF and max 2MB size
        ]);

        if ($request->hasFile('CV')) {
            // Use the 'cvs' disk to store the file securely

            $datePath = now()->format('FY');
            $cvPath = $request->file('CV')->store("applicants/$datePath", 'cvs');
            $validatedData['CV'] = $cvPath; // This stores the file path relative to the disk's root
        }
        $token1 = Str::random(60);
        $token2 = Str::random(60);

        $validatedData['confirmation_token'] = $token1;
        $validatedData['email_token'] = $token2;


        try {
            $newRequest = applicantstemporary::create($validatedData);

            Mail::to($validatedData['Email'])->send(new igcMail($token1));

            return redirect()->route('ApplicationRequestView')->with(
                'success',
                'Thank you for your submission. Please check your email to confirm.'
            );
        } catch (\Exception $e) {
            // Check if the exception is a duplicate entry error
            if ($e->getCode() == 23000) {
                return redirect()->back()->withInput()->withErrors(['Email' => 'This email is already used. Please choose another email.']);
            } else {
                return redirect()->route('ApplicationRequestView')->with('error', 'There was an error sending the confirmation email. Please try again or contact us for more feedback.');
            }
        }
    }

    public function confirm($token)
    {
        // Find the entry in the temporary table using the token
        $ApplicantsTemporary = ApplicantsTemporary::where('confirmation_token', $token)->firstOrFail();

        // Move the data to the main `applicants` table
        $applicantData = $ApplicantsTemporary->toArray();
        unset($applicantData['UserID'], $applicantData['confirmation_token']); // Do not transfer the id or token
        $applicant = Applicant::create($applicantData);

        // Delete the temporary record
        $ApplicantsTemporary->delete();

        // Redirect with a success message
        return redirect()->route('ApplicationRequestView')->with('confirmed', 'Your application has been confirmed! we will contact you soon');
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
}
