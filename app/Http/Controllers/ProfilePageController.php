<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfilePageController extends Controller
{
    //

    public function index(User $userId){
        // $userData = $request;

        dd($userId->all());
        return Inertia::render('Chat/VProfile', ['profile_details'=>$userData]);
    }
}
