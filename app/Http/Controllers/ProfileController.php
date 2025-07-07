<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Log all submitted data except CSRF token and actual file content
            Log::info('[ProfileController::store FORM VALUES]', $request->except(['_token', 'profile_image']));


            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:profiles,email',
                'contact' => 'nullable|string',
                'objectives' => 'nullable|string|max:500',
                'birthdate' => 'required|date_format:Y-m-d',                
                'age' => 'nullable|integer|min:0|max:120',
                'summary' => 'nullable|string',
                'profile_image' => 'nullable|image|max:2048',
                'job_experiences' => 'nullable|string',           
            ]);

            $profile = new Profile($validated);

            if ($request->hasFile('profile_image')) {
                $path = $request->file('profile_image')->store('profiles', 'public');
                $profile->profile_image = $path;
            }

            // Profile::create($data);
            // return redirect()->route('profile.index')->with('success', 'Profile created!');

            $profile->save();
            return redirect()->route('profiles.index', $profile)->with('success', 'Profile created!');
        } catch (\Exception $e) {
            Log::error('[ProfileController::store ERR]' . $e->getMessage());
            return back()->withErrors('An error occurred while creating the profile. Please try again.')->withInput();
        }        
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:profiles,email,' . $profile->id,
            'contact' => 'nullable|string|max:11',
            'objectives' => 'required|string|max:255',
            'birthdate' => 'required|date_format:Y-m-d',            
            'age' => 'nullable|string|max:2',
            'summary' => 'nullable|string',
            'profile_image' => 'nullable|image|max:2048',
            'job_experiences' => 'nullable'            

        ]);

        $profile->fill($validated);

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('profiles', 'public');
            $profile->profile_image = $path;
        }

        $profile->save();

        return redirect()->route('profiles.show', $profile)->with('success', 'Profile updated!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}