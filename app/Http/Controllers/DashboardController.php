<?php

namespace App\Http\Controllers;

use App\Models\Ideas;
use Inertia\Inertia;

class DashboardController extends Controller
{
    //
    public function index()
    {

        // $posts = new Ideas(
        //     [
        //         // 'id' => 1,
        //         // 'userName' => 'Rashid Seif',
        //         'content' => 'Hello there everyone, I am greeting you from my home here in Mikindani🏠',
        //         'likes' => 30,
        //     ]
        // );
        // $posts->save();
        return Inertia::render('Chat/VHome', ['posts' => Ideas::orderBy('created_at', 'DESC')
                ->paginate(5)]);
    }
}
