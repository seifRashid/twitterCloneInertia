<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfilePageController extends Controller
{
    public function index()
    {
        // $userData = $request;

        // $user = auth()->user();
        // dd($user);
        return Inertia::render('Chat/VProfile');
    }

    public function update(User $user_id)
    {
        dd($user_id);
        // $validated = request()->validate([
        //     'bio' => 'required',
        //     'profilePic' => 'image',
        // ]);
        $user_id = request('user_id')->get();
        dd($user_id);
    }
}
