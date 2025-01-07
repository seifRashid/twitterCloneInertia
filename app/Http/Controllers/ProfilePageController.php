<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfilePageController extends Controller
{
    //

    public function index(){
        // $userData = $request;

        // $user = auth()->user();
        // dd($user);
        return Inertia::render('Chat/VProfile');
    }
}
