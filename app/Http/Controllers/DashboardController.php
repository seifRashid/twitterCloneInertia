<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Ideas;
use Inertia\Inertia;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $ideas = Ideas::with('user:id,name')->orderBy('created_at', 'DESC');
        if (request()->has('search')) {
            $ideas = Ideas::where('content', 'like', '%' . request()->get('search', '') . '%');
        }
        // $comments = $ideas->comments;
        // dd(Comment::all());
        $comments = Comment::all();
        return Inertia::render('Chat/VHome', ['posts' => $ideas
                ->paginate(5), 'comments'=>$comments]);
    }
}
