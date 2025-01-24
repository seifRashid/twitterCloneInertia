<?php

namespace App\Http\Controllers;

use App\Models\User;

class FollowController extends Controller
{
    //
    public function follow(User $user)
    {
        dd($user);
        // $follower = auth()->user();
        // // dd('hello');
        // $follower->followings()->attach(1);
        // return redirect()->back()->with('success', 'User followed successfuly');
    }

    public function unfollow()
    {
        $user = auth()->user();
        $user->unfollow()->toggle(auth()->id());
        return redirect()->back();
    }

}
