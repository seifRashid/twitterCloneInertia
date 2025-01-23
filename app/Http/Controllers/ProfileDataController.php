<?php

namespace App\Http\Controllers;

use App\Models\ProfileData;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfileDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Chat/VProfile');

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
    public function show(ProfileData $profileData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfileData $profileData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileUpdateRequest $request, ProfileData $profileData)
    {
        //
        dd($profileData);
        // $validated = request()->validate([
        //     'bio' => 'required',
        //     'profilePic' => 'image',
        // ]);
        $user_id = request('user_id')->get();
        dd($user_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfileData $profileData)
    {
        //
    }
}
