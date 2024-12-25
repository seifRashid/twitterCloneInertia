<?php

namespace App\Http\Controllers;

use App\Models\Ideas;
use Inertia\Inertia;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $ideas = Ideas::orderBy('created_at', 'DESC');
        if (request()->has('search')) {
            $ideas = Ideas::where( 'content', 'like', '%' . request()->get('search','') . '%');
        }
        
        return Inertia::render('Chat/VHome', ['posts' => $ideas
                ->paginate(5)]);
    }
}
