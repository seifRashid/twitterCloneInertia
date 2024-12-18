<?php

namespace App\Http\Controllers;

use App\Models\Ideas;
use Illuminate\Http\Request;

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
    public function show(Ideas $ideas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ideas $ideas)
    {
        //
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
    public function destroy(Ideas $ideas)
    {
        //
    }
}
