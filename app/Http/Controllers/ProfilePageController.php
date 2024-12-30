<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfilePageController extends Controller
{
    //

    public function index(){
        $profile_details = auth()->user();
        // dd($profile_details);
        return Inertia::render('Chat/VProfile', ['profile_details'=>$profile_details]);
    }
}
