<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowController extends Controller
{
    //
    public function follow(){
        dd('hello Rashid');
        // $user = auth()->user();
        // $user->follow()->toggle(auth()->id());
        // return redirect()->back();
        }
        
    public function unfollow(){
        $user = auth()->user();
        $user->unfollow()->toggle(auth()->id());
        return redirect()->back();
    }


}
