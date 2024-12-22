<?php

namespace App\Http\Controllers;

use App\Models\Ideas;
use Illuminate\Http\Request;
use Inertia\Inertia;

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

        Ideas::create($validated);
        // dd('Hello from controller');
        return redirect()->route('home')->with('success', 'Post created successfully🚀');

    }

    /**
     * Display the specified resource.
     */
    public function show($ideas)
    {
        //
        $ideas = Ideas::where('id', $ideas)->firstOrFail();
        return Inertia::render('Chat/TweetShow', ['posts' => $ideas]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($ideas)
    {
        //
        // $editing = true;
        $ideas = Ideas::where('id', $ideas)->firstOrFail();
        return Inertia::render('Chat/TweetShow', ['posts' => $ideas,'editing'=>true]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ideas $ideas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ideas)
    {

        $ideas = Ideas::where('id', $ideas)->firstOrFail();
        // dd($ideas);
        $ideas->delete();
        //
        // $ideas->delete();

        // $ondoa = Ideas::find($ideas)->pluck('id');
        // dd($ondoa);
        // Ideas::destroy(7);
        return redirect()->route('home')->with('success', 'Post deleted successfully🚀');
        // // return redirect(route('home'));
    }
}
