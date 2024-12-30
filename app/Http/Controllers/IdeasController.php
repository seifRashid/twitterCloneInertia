<?php

namespace App\Http\Controllers;

use App\Models\Ideas;
use Illuminate\Http\Request;
use Inertia\Inertia;

use function Laravel\Prompts\alert;

class IdeasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validated = $request->validate([
            'content' => 'required|string|max:255|min:3',
        ]);

        $validated['user_id'] = auth()->id();
        Ideas::create($validated);
        // dd('Hello from controller');
        return redirect()->route('home')->with('success', 'Post created successfully🚀');

    }

    /**
     * Display the specified resource.
     */
    public function show($ideas)
    {
        $ideas = Ideas::with('user:id,name')->where('id', $ideas)->firstOrFail();
        $comments = $ideas->comments;
        return Inertia::render('Chat/TweetShow', ['posts' => $ideas, 'comments'=>$comments ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($ideas)
    {
        $ideas = Ideas::where('id', $ideas)->firstOrFail();
        if(auth()->id() !== $ideas->user_id){
            abort(403);
        }
        return Inertia::render('Chat/TweetShow', ['posts' => $ideas,'editing'=>true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$ideas)
    {
        //
        dd($ideas);
        $validated = $request->validate([
            'content' => 'required|string|max:255|min:3',
            ]);
            $ideas = Ideas::where('id', $ideas)->firstOrFail();
            $ideas->update($validated);
            return redirect()->route('tweet.show', $ideas->id)->with('success', 'Post updated successfully🚀');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ideas)
    {

        $ideas = Ideas::where('id', $ideas)->firstOrFail();
        if(auth()->id() !== $ideas->user_id){
            abort(403);
        }
        $ideas->delete();
        return redirect()->route('home')->with('success', 'Post deleted successfully🚀');
    }
}
